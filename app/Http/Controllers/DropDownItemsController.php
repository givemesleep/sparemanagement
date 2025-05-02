<?php

namespace App\Http\Controllers;

use App\Models\DropDown\Manufactor;
use App\Models\DropDown\HardwareTypes;
use App\Models\DropDown\Warehouse;
use App\Models\DropDown\hwCateg;
use App\Models\DropDown\Platform;
use App\Models\DropDown\Auditor;
use App\Models\DropDown\Sites;
use Illuminate\Http\Request;

class DropDownItemsController extends Controller
{
 public function getDropDown(){

  // var_name $manu, $auditor, $hwtype .... 
  // class name Manufactor, Auditor, HardwareTypes ...
  $manu = Manufactor::select('manuID', 'manuDesc')->get();
  $hwtype = HardwareTypes::select('hardwareID', 'hardwareType')->get();
  $hwcateg = hwCateg::select('hwcatID', 'hwcatDesc')->get();
  $warehouse = Warehouse::select('wareID', 'warehouseDesc')->get();
  $sites = Sites::select('siteID', 'siteDesc')->get();
  $platform = Platform::select('platformID', 'platformDesc')->get();
  $auditor = Auditor::select('auditorID', 'auditorName')->get();

   // dd($manu);
   // $manu = Manufactor::pluck('manuDesc', 'manuID');
   return view('spares.sparesReceived', compact('manu', 'hwtype', 'warehouse', 'hwcateg', 'platform', 'sites', 'auditor'));
 }   
}
