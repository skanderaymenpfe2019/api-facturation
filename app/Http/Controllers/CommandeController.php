<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF ;

use Mail ;

class CommandeController extends Controller
{

    // Créer Commande

    public function createCommande(Request $request)
	{
        $commands = Commande::create($request->all());
        return response()->json($commands);
    }

    // Mis-a-jour Commande

    public function updateCommande(Request $request, $id)
    {
        $commands = DB:: table('commands')->where('id',$request->input('id'))->get();
        $commands->client_id = $request->input('client_id');
        $commands->ref = $request->input('ref');
        $commands->regulation = $request->input('regulation');
        $commands->remark = $request->input('remark');
        $commands->date = $request->input('date');
        $commands->date_deadline = $request->input('date_deadline');
        $commands->ref_client = $request->input('ref_client');
        $commands->name = $request->input('name');
        $commands->email = $request->input('email');
        $commands->adress = $request->input('adress');
        $commands->postcode = $request->input('postcode');
        $commands->city = $request->input('city');
        $commands->tva_client = $request->input('tva_client');
        $commands->country_id = $request->input('country_id');
        $commands->phone = $request->input('phone');
        $commands->fax = $request->input('fax');
        $commands->payment_mdoe = $request->input('payment_mode');
        $commands->total_price = $request->input('total_price');
        $commands->advance = $request->input('advance');
        $commands->invoiced = $request->input('invoiced');
        $commands->status = $request->input('status');
        $commands->currency_id = $request->input('currency_id');
        $commands->save();
           $response["commands"] = $commands;
           $response["success"] = 1;
        return response()->json($response);
    }

    // Supprimer Commande

    public function deleteCommande($id){
        $commands  = DB::table('commands')->where('id',$request->input('id'))->get();
        $commands->delete();
        return response()->json('Removed successfully.');
    }

    // Afficher Commande

    public function index(){
        $clients  = Client::all();
           $response["commands"] = $clients;
           $response["success"] = 1;
        return response()->json($response);
    }

    // Aeprcue en PDF
    
    public function generatePDF(){
        $data = ['title' =>'Cher Client, Veuillez trouver en annexe votre bon de commande , tout en sachant que nous y avons intégrée les meilleurs conditions tarifaire , ajustée a votre demande de renseignement , au plaisir de vous conduire , bien à vous merci .'];
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('myPDF.blade.pdf');
    }

    // Envoyer Par Mail

    public function attachmentEMAIL() {
        $data = array('name'=>"CloudBill");
        Mail::send('mail', $data, function($message) {
           $message->to('abc@gmail.com', 'Tutorials Point')->subject
              ('Laravel Testing Mail with Attachment');
           $message->attach('C:\wamp64\www\restapi\resources\views\myPDF.blade.php');
           $message->from('ssamoud76@gmail.com','CloudBill');
        });
        echo "Email Sent with attachment. Check your inbox.";
     }

     // Créer une Facture

    public function createFacture(){
        redirect()->action('FactureController@createFacture')->where('id',$request->input('id'))->get();
    }

}
