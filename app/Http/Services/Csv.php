<?php

namespace App\Http\Services;

use App\Models\Zones;

class Csv
{
    public function processCsvFile($file): array
    {
        $file = fopen($file->getPathname(), 'r');

        $data = [];
        while ($row = fgetcsv($file)) {
            $field = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
            $data[] = $field;
        }
        return $data;
    }

    public function saveData($csvData): void
    {
        $data = [];
        foreach ($csvData as $row) {
            $data[] = ['zone' => $row[0],
                'price' => $row[1],
                'created_at' => now('Europe/Warsaw'),
            ];
        }
        Zones::insert($data);
    }
}
