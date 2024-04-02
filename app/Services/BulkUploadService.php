<?php
namespace App\Services;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class BulkUploadService {
    public static function import($filePath) {
        $file = Storage::get($filePath);
        $rows = explode("\n", $file);


        foreach (array_chunk($rows, 100) as $chunk) {
            $chunk = array_filter($chunk);
            foreach ($chunk as $row) {
                $data = str_getcsv(trim($row));

                Student::create([
                    'name' => $data[0],
                    'roll' => $data[1],
                    'session' => $data[2],
                    'gender' => $data[3],
                ]);
            }
        }

        Storage::delete($filePath);
    }
}
