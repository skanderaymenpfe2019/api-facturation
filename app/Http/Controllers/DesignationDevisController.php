<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationDevisController extends Controller
{
    // Créer Désignation Devis

    public function createDesignationDevis(Request $request)

    {
        $designations = DesignationDevis::create($request->all());
        return response()->json($designations);
    }

    // Supprimer Désignation Commande

    public function deleteDesignationDevis($id)
    {
        $designations = DB::table('designations')->where('id',$request->input('id'))->get();
        $designations = delete();
        return response()->json('Removed successfully');
    }
}
