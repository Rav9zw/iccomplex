<?php

namespace App\Http\Controllers;

use App\Models\Zones;
use Illuminate\Http\Request;
use App\Http\Services\Csv;

class ImportCsvController extends Controller
{
    public function index()
    {
        return view('importCsv/index');
    }


    public function import(Request $request, Csv $csv)
    {
        Zones::truncate();
        $file = $request->file('file');
        $csvData = $csv->processCsvFile($file);
        $csv->saveData($csvData);
        return redirect()->route('importCsv')->with('message', 'Uploaded new Zone file');
    }
}
