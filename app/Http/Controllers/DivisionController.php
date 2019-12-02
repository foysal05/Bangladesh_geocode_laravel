<?php

namespace App\Http\Controllers;

use App\Distric;
use App\Division;
use Illuminate\Http\Request;
use DB;

class DivisionController extends Controller
{
   public function test(Request $request, $id)
   {
      $upazilas = DB::table('upazilas')->where('district_id', $request->id)->get();
      return   $upazilas;
   }


   public function ajaxDistricList(Request $request)
   {
      $districts = DB::table('districts')->where('division_id', $request->id)->get();
      return response()->json([$districts]);
   }

   public function ajaxUpazilaList(Request $request)
   {

      $upazilas = DB::table('upazilas')->where('district_id', $request->id)->get();
      return response()->json([$upazilas]);
   }

   public function ajaxUnionList(Request $request)
   {

      $unions = DB::table('unions')->where('upazilla_id', $request->id)->get();
      return response()->json([$unions]);
   }
}
