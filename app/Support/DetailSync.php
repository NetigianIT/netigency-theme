<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;

class DetailSync
{
    /**
     * Sync detail rows for a parent (service / portfolio).
     *
     * @param  class-string<Model>  $detailClass
     * @param  array<int, array<string, mixed>>  $rows
     */
    public static function sync(string $detailClass, string $foreignKey, int $parentId, array $rows): void
    {
        $keptIds = [];

        foreach ($rows as $row) {
            if (! is_array($row)) {
                continue;
            }

            $title = trim((string) ($row['title'] ?? ''));
            $desc = trim((string) ($row['desc'] ?? ''));

            if ($title === '' && $desc === '') {
                continue;
            }

            $data = [
                $foreignKey => $parentId,
                'title' => $title !== '' ? $title : '-',
                'desc' => $desc !== '' ? $desc : '-',
                'order' => (int) ($row['order'] ?? 0),
            ];

            $existingId = isset($row['id']) ? (int) $row['id'] : 0;

            if ($existingId > 0) {
                $detail = $detailClass::query()
                    ->where('id', $existingId)
                    ->where($foreignKey, $parentId)
                    ->first();

                if ($detail) {
                    $detail->update($data);
                    $keptIds[] = $detail->id;
                    continue;
                }
            }

            $keptIds[] = $detailClass::create($data)->id;
        }

        $query = $detailClass::query()->where($foreignKey, $parentId);

        if ($keptIds === []) {
            $query->delete();
            return;
        }

        $query->whereNotIn('id', $keptIds)->delete();
    }

    /**
     * @return array<string, mixed>
     */
    public static function validationRules(): array
    {
        return [
            'details' => 'nullable|array',
            'details.*.id' => 'nullable|integer',
            'details.*.title' => 'nullable|string|max:255',
            'details.*.desc' => 'nullable|string',
            'details.*.order' => 'nullable|integer',
        ];
    }
}
