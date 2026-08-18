<?php

namespace App\Http\Requests;

use App\Models\Admin\Message;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:120', 'regex:/^[\p{L}\s.\'-]+$/u'],
            'email' => ['required', 'string', 'email:rfc', 'max:255'],
            'subject' => ['required', 'string', 'min:3', 'max:200'],
            'message' => ['required', 'string', 'min:10', 'max:500'],
            '_form_started_at' => ['required', 'integer'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => trim(strip_tags((string) $this->input('name'))),
            'email' => strtolower(trim(strip_tags((string) $this->input('email')))),
            'subject' => trim(strip_tags((string) $this->input('subject'))),
            'message' => trim(strip_tags((string) $this->input('message'))),
        ]);
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $startedAt = (int) $this->input('_form_started_at');
            $elapsed = time() - $startedAt;

            if ($startedAt <= 0 || $elapsed < 3 || $elapsed > 7200) {
                $validator->errors()->add('message', 'Unable to send message. Please try again.');
            }

            $combined = strtolower($this->input('subject').' '.$this->input('message'));

            if (preg_match_all('/https?:\\/\\/|www\\./i', $combined) > 2) {
                $validator->errors()->add('message', 'Unable to send message. Please try again.');
            }

            if (preg_match('/(<script|javascript:|onerror=|onload=|<iframe|<object|<embed)/i', $combined)) {
                $validator->errors()->add('message', 'Unable to send message. Please try again.');
            }

            $recentDuplicate = Message::query()
                ->where('email', $this->input('email'))
                ->where('created_at', '>=', now()->subMinutes(30))
                ->where(function ($query) {
                    $query->where('message', $this->input('message'))
                        ->orWhere('subject', $this->input('subject'));
                })
                ->exists();

            if ($recentDuplicate) {
                $validator->errors()->add('message', 'This message was already sent recently.');
            }
        });
    }

    public function validatedPayload(): array
    {
        return $this->safe()->only(['name', 'email', 'subject', 'message']);
    }
}
