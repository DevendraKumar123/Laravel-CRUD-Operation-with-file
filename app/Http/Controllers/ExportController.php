<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Employee;

class ExportController extends Controller
{
    public function exportData()
    {
        $fileName = 'employees_data.csv';

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID','Name', 'Date of Birth', 'Email', 'Mobile', 'PAN Card', 'Image']);

            $employees = Employee::all();
            foreach ($employees as $employee) {
                fputcsv($file, [
                    $employee->id,
                    $employee->name,
                    $employee->dob,
                    $employee->email,
                    $employee->mobile,
                    $employee->pancard,
                    $employee->image ? url('upload/img/' . $employee->image) : ''
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
