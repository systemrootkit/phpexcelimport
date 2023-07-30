<?php

namespace App\Http\Controllers;

use App\Imports\YourExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function dataExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');


        try {
            // Excel::import(new YourExcelImport, $file);
            $import = new YourExcelImport;
            Excel::import($import, $file);

            $data = $import->getData();

            return view('data', compact('data'))->with('success', 'File imported successfully.');

            // return redirect()->back()->with('success', 'File imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing the file: ' . $e->getMessage());
        }
    }

}
