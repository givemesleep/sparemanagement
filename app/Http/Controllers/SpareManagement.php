<?php

namespace App\Http\Controllers;

use App\Models\SpareManagement\SpareTicket;
use App\Models\SpareManagement\SparePullout;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpareManagement extends Controller
{
    // Spares Main Inventory
    public function sparesInventory()
    {
        $indexSpares = SpareTicket::where('is_active', 1)
                    ->where('is_pullout', 0)
                    ->where('is_defect', 0)
                    ->where('is_approved', 1)
                    ->get();

        $SparesInv = DB::table('tblsparesinfo')
                    ->select('part_model1')
                    ->distinct()
                    ->get();

        

        return view('spares.sparesTable', ['spares' => $indexSpares]);
    }

    //Spares Add

    public function sparesReceived(){
        return view('spares.sparesReceived');
    }

    public function createTicket(Request $request)
    {   
        try{
        // Validate the incoming data
        $datas = $request->validate([
            'manufacturer' => 'required|string',
            'hardware_type' => 'required|string',
            'hardware_category' => 'required|string',
            'descriptions' => 'required|string|max:255',
            'part_model1' => 'required|string|max:40',
            'part_model2' => 'nullable|string|max:40',
            'part_model3' => 'nullable|string|max:40',
            'serial_model' => 'nullable|string|max:40',
            'warehouse_loc' => 'nullable|string',
            'hardware_site' => 'nullable|string',
            'platform_type' => 'nullable|string',
            'received_by' => 'required|string'
        ]);

        // Debugging: Dump and Die to inspect the request data
        // dd($request->all());

        // dd($request->all());
        
        SpareTicket::create($datas);
        return redirect()->route('spares.sparesPending')->with('success', 'Spare ticket created successfully!');
        }catch(\Exception $e){
            // Handle the exception
            return redirect()->back()->with('error', 'Failed to create spare ticket: ' . $e->getMessage());
        }
    }


    //Spares Pending
    public function sparesPending(){

        // $pendingSpares = SpareTicket::where('status', 'pending')->get();
        // $pendingSpares = DB::table('tblsparesinfo')->get();
        $pendingSpares = SpareTicket::where('is_active', 1)
            ->where('is_pullout', 0)
            ->where('is_defect', 0)
            ->where('is_approved', 0)
            ->get();
        return view('spares.sparesPending', ['item' => $pendingSpares]);
    }
    
    public function showDetails($ViewSparesID){

        $sparesID = SpareTicket::find($ViewSparesID);
        // $BarcodeToScan = '/spares/barcodeScanned/' . $sparesID->sparesID;
        $generator = new BarcodeGeneratorHTML();
        $barcodeHTML = $generator->getBarcode($sparesID->part_model1, $generator::TYPE_CODE_128);
        // $barcodeHTML = $generator->getBarcode($sparesID->part_model1, $generator::TYPE_CODE_128);

        return view('spares.viewSpares', compact('sparesID', 'barcodeHTML'));
    }

    public function AppSpares(SpareTicket $ApprovedSparesID)
    {
        $ApprovedSparesID->update(['is_approved' => 1]);
        // dd($ApprovedSparesID);
        return redirect()->route('spares.sparesTable')->with('success', 'Spare Approved successfully!');
    }

    public function RejSpares(SpareTicket $RejectSparesID)
    {
        $RejectSparesID->update(['is_active' => 0]);
        // dd($ApprovedSparesID);
        return redirect()->route('spares.sparesPending')->with('success', 'Spare Rejected successfully!');
    }


    // Spares PullOut
    public function sparesPullout(){

        $PullOut = SpareTicket::where('is_pullout', 1)
            ->where('is_active', 1)
            ->where('is_defect', 0)
            ->where('is_approved', 1)
            ->get();    

        return view('spares.sparesPullout', ['pullout' => $PullOut]);
    }

    public function AddPullOut(SpareTicket $PullOutSparesID, Request $request){
        // Get the primary key value of the SpareTicket model
        $primaryKey = $PullOutSparesID->getKey();

        // Example usage: you can now use $primaryKey as needed
        // dd($primaryKey);

        $PullOutSparesID->update(['is_pullout' => 1]);
        // $getID = SpareTicket::where('sparesID', $primaryKey)->first();

        dd($primaryKey);

        // $spareID = SpareTicket::find($PullOutSparesID);
        // dd($spareID);
        DB::insert('INSERT INTO tblsparespullout(sparesID, PullOutDate) VALUES (?, ?)', [$primaryKey, NOW()]);
        
        return redirect()->route('spares.sparesPullout')->with('success', 'Spare PullOut successfully!');
        //Session Key : success
    }
        
    //     // $PullOutSparesID->update(['is_pullout' => 1]);
    //     $getID = SpareTicket::where('sparesID', $PullOutSparesID->sparesID)->first();

    //     // dd($getID);

    //     // $spareID = SpareTicket::find($PullOutSparesID);
    //     // dd($spareID);
    //     DB::insert('INSERT INTO tblsparespullout(sparesID, PullOutDate) VALUES (?, ?)', [$getID, NOW()]);
        
    //     // return redirect()->route('spares.sparesPullout')->with('success', 'Spare PullOut successfully!');
    //     //Session Key : success
    
    // }


    // Spares Archive
    public function SpareArchive(SpareTicket $ArchiveSparesID){
        $ArchiveSparesID->update(['is_active' => 0, 'is_approved' => 0]);
        // dd($ArchiveSparesID);
        return redirect()->route('spares.sparesTable')->with('success', 'Spare Archived successfully!');
    }

    // Spares EOSL
    public function sparesEOSL(){
        return view('spares.sparesEOSL');
    }

    // Spares Defect
    public function sparesDefect(){
        return view('spares.sparesDefect');
    }

    //Barcode Scanning
    public function barcodeScanned(SpareTicket $barcode){
        try{
            $sparesID = SpareTicket::where('part_model1', $barcode)->first();

            $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
            $barcodeHTML = $generator->getBarcode($sparesID->part_model1, $generator::TYPE_CODE_128);

            return view('spares.viewSpares', compact('sparesID', 'barcodeHTML'));

        }catch(\Exception $e){
            // Handle the exception
            return redirect()->back()->with('error', 'Failed to load scanning' . $e->getMessage());
        }
        
    }

}
