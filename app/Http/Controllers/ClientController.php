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
        $client->email = $request->input('email');
        $client->adress = $request->input('adress');
        $client->postcode = $request->input('postcode');
        $client->city = $request->input('city');
        $client->tva = $request->input('tva');
        $client->country_id = $request->input('country_id');
        $client->phone = $request->input('phone');
        $client->fax = $request->input('fax');
        $client->name = $request->input('name');

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
