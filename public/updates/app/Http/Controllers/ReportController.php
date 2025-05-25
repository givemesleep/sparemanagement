<?php

namespace App\Http\Controllers;

use App\Exports\SparesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SpareInfo;
use App\Imports\SparesPreviewImport;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function spares(){
        $spares = SpareInfo::all();
        return view('sparesinfo_report', compact('spares'));
    }

    public function preview(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
    ]);

    $import = new SparesPreviewImport();
    Excel::import($import, $request->file('file')); 

    // Store parsed rows in session
    Session::put('preview_spares_data', $import->data);

    // Redirect to preview page
    return redirect()->route('spares.preview.view');
}

//Preview and Discard

public function showPreview()
{
    $data = Session::get('preview_spares_data');

    if (!$data) {
        return redirect()->back()->with('error', 'No data available for preview.');
    }

    return view('spares.preview', ['rows' => $data]);
}

public function confirmUpload()
{
    $data = Session::get('preview_spares_data');

    if (!$data) {
        return redirect()->back()->with('error', 'No data to import.');
    }

    foreach ($data as $row) {
        \App\Models\SpareInfo::create([
            'manufacturer' => $row['manufacturer'],
            'hardware_type' => $row['hardwaretype'],
            'hardware_category' => $row['hardwarecategory'],
            'descriptions' => $row['descriptions'],
            'part_model1' => $row['partmodel1'],
            'part_model2' => $row['partmodel2'],
            'part_model3' => $row['partmodel3'],
            'serial_model' => $row['serialmodel'],
            'warehouse_loc' => $row['warehouselocation'],
            'hardware_site' => $row['hardwaresite'],
            'platform_type' => $row['platformtype'],
            'received_by' => $row['receivedby'],
        ]);
    }

    Session::forget('preview_spares_data');

    //return redirect()->route('spares.preview.view')->with('success', 'Data imported successfully!');
    return response()->view('spares.close-tab');

}

public function discardPreview()
{
    Session::forget('preview_spares_data');
    return redirect()->route('spares.preview.view')->with('info', 'Import discarded.');
}
// End of it


    // public function import(Request $request) 
    // {

    //     $request->validate([
    //         'file' => 'required|file|mimes:xlsx,xls,csv|max:10240', // Optional: 10MB max size
    //     ], [
    //         'file.required' => 'Please upload a file.',
    //         'file.mimes' => 'The file must be an Excel or CSV file.',
    //         'file.max' => 'The file size must not exceed 10MB.',
    //     ]);
        
    //     Excel::import(new SparesImport, $request->file('file'));
    //     return back()->with('success', 'User Imported Succesfully!');
    // }

    public function export(Request $request)
    {
        $fields = $request->input('fields', []); // Optional: defaults to all if empty
        return Excel::download(new SparesExport($fields), 'SparesInfo.xlsx');
    }
}
