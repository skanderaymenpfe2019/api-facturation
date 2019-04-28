<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationFactureController extends Controller
{
    public function createDesignationFacture(Request $request)
    {
        $devis = DesignationFacture::create($request->all());
        return response()->json($designation_invoices);

    }
    public function deleteDesignationFacture($id)
    {
        $designation_invoices = DB::table('designation_invoices')->where('id',$request->input('id'))->get();
        $designation_invoices = delete();
        return response()->json('Removed successfully');
    }
}
