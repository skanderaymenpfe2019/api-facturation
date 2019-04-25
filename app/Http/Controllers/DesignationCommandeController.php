<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationCommandeController extends Controller
{
    
    // Créer Désignation Commande

    public function createDesignationCommande(Request $request)

    {
        $designation_commands = DesignationCommande::create($request->all());
        return response()->json($designation_commands);
    }

    // Supprimer Désignation Commande

    public function deleteDesignationCommande($id)
    {
        $designation_commands = DB::table('designation_commands')->where('id',$request->input('id'))->get();
        $designation_commands = delete();
        return response()->json('Removed successfully');
    }

}
