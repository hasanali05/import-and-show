<?php

namespace App\Imports;

use App\Models\Work;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class WorkImport implements ToCollection, WithChunkReading, ShouldQueue
{
    public $headers = [
        'Month', 'Date', 'Day', 'ID', 'Employee Name', 'Department', 'First-In Time', 'Last-Out Time', 'Hours of Work'
    ];

    public $data = [];

    public function collection(Collection $rows)
    {

        if (count($rows) < 1) {
            $this->data = [
                'data' => [
                    'success' => false,
                    'message' => 'No data found.'
                ]
            ];

            return false;
        }

        unset($rows[0]);

        foreach ($rows as $row) {
            Work::create([
                'month' => $row[0] ?? '',
                'date' => \Carbon\Carbon::createFromFormat('Y-m-d', trim($row[1]))->format('Y-m-d'),
                'day' => $row[2] ?? '',
                'employee_id' => $row[3] ?? '',
                'employee_name' => $row[4] ?? '',
                'department' => $row[5] ?? '',
                'first_in_time' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]))->format('H:i'),
                'last_out_time' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]))->format('H:i'),
                'hour_of_work' => $row[8] ?? 0,
            ]);
        }
        $this->data = [
            'data' => [
                'success' => true,
                'message' => 'Success!'
            ]
        ];

        return true;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
