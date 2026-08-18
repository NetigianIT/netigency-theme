<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Admin\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(StoreContactMessageRequest $request)
    {
        Message::create($request->validatedPayload());

        return $this->successResponse($request);
    }

    protected function successResponse(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'message sent successfully',
            ]);
        }

        return redirect()->to('/#contact')
            ->with('success', 'frontend.your_message_has_been_delivered');
    }
}
