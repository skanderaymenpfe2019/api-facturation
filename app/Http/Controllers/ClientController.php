<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;

class ClientController extends Controller
{
    public function createClient(Request $request)
	{
        $clients = Client::create($request->all());
        return response()->json($clients);
    }
    public function updateClient($id,REQUEST $request){
        //$clients  = DB::table('clients')->where('id',$request->input('id'))->get();
        $client=Client::find($id);
        $client->ref = $request->input('ref');
        //$clients->email = $request->input('email');
        //$clients->adress = $request->input('adress');
        //$clients->postcode = $request->input('postcode');
        //$clients->city = $request->input('city');
        //$clients->tva = $request->input('tva');
        //$clients->country_id = $request->input('country_id');
        //$clients->phone = $request->input('phone');
        //$clients->fax = $request->input('fax');
        //$clients->name = $request->input('name');

           $client->save();
           $response["client"] = $client;
           $response["success"] = 1;
        return response()->json($response);
    }
    public function deleteClient($id){
        //$clients  = DB::table('clients')->where('id',$request->input('id'))->get();
        $client=Client::find($id);
        //dd($client);
        $client->delete();
        return response()->json('Removed successfully.');
    }
    public function index(){
        $clients  = Client::all();
           $response["clients"] = $clients;
           $response["success"] = 1;
        return response()->json($response);
    }
}
