<?php

namespace App\Http\Controllers;

use Database;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Assignment;
use App\Models\InfoOptions;
use App\Models\Information;
use App\Models\ExtraOptions;
use App\Models\SpeciesTypes;
use Illuminate\Http\Request;
use App\Models\ConditionOptions;

class AssignmentController extends Controller
{
    //
    public function index(Request $request){
        $response  = [];
        $types = InfoOptions::select('*')->groupBy('type_of_point')->get();
        $users = User::select('*')->get();
        // $species = SpeciesTypes::select('*')->groupBy('base_species')->get();
        // $conditions = ConditionOptions::select('*')->get();
        // $extras = ExtraOptions::select('*')->get();
   
        $invoice_geo_ids =  Invoice::select('*')->get();
        return view('create-assig',compact('response','invoice_geo_ids','users'));
    }
    public function view(){
        $assignments = Assignment::with('user','user.UserInfo')->paginate(10);
        //$user_data = $assignments->load('UserInfo');
        //dd($assignments);
        
        return view('view-assg',compact('assignments'));
    }

    public function fetchInfoOption(Request $request){
        $data = [];
        $infoOptions = InfoOptions::where(['type_of_point'=>$request->TypeOfPoint])->get();
        
        return $infoOptions;
    }

    public function fetchConditionOption(Request $request){
        $data = [];
        $conditionOptions = ConditionOptions::where(['id'=>$request->ConditionOptionId])->get();
        
        return $conditionOptions;
    }

    public function fetchExtraOption(Request $request){
        $data = [];
        $extraOptions = ExtraOptions::where(['id'=>$request->ExtraOptionId])->get();
        
        return $extraOptions;
    }


    public function storeAssig(Request $request)
    {
    
        // $data =explode("&",$request->Data);
        // $dataArray = array();
        // foreach($data as $row)
        // {
        //     $splitRow = explode("=",$row);
        //     $dataArray[$splitRow [0]] = $splitRow[1] ; 
        // }
        return  $request->Data ;
       // exit();
        // Information::create([
        //     'EmployeeId'=>$activeby,
        //     'CallTypeId'=>$request->calltypeid,
        //     'DispositionId'=>$request->dispositionid,
        //     'DispositionDetailId'=>$request->dispositiondetailid,
        //     'ClientName'=>$request->client_name,
        //     'ContactNumber'=>$request->contact,
        //     'BranchId'=>$branchId,
        //     'Address'=>$request->address,
        //     'Comment'=>$request->Comment,
        //     'Property'=>$request->property,
        //     'FutureInvestment'=> $request->investment,

        // ]);
        // return redirect('/home')->with('success','The Response Added successfuly!');
    }
    
}
