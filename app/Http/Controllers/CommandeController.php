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
       // $commands = DB:: table('commands')->where('id',$request->input('id'))->get();
        $command=Commande::find($id);
        $command->ref = $request->input('ref');
        $command->regulation = $request->input('regulation');
        $command->remark = $request->input('remark');
        $command->date = $request->input('date');
        $command->date_deadline = $request->input('date_deadline');
        $command->ref_client = $request->input('ref_client');
        $command->name = $request->input('name');
        $command->email = $request->input('email');
        $command->adress = $request->input('adress');
        $command->postcode = $request->input('postcode');
        $command->city = $request->input('city');
        $command->tva_client = $request->input('tva_client');
        $command->country_id = $request->input('country_id');
        $command->phone = $request->input('phone');
        $command->fax = $request->input('fax');
        $command->payment_mdoe = $request->input('payment_mode');
        $command->total_price = $request->input('total_price');
        $command->advance = $request->input('advance');
        $command->invoiced = $request->input('invoiced');
        $command->status = $request->input('status');
        $command->currency_id = $request->input('currency_id');
        $command->save();
           $response["command"] = $command;
           $response["success"] = 1;
        return response()->json($response);
    }

    // Supprimer Commande

    public function deleteCommande($id){
        //$command = DB::table('commands')->where('id',$request->input('id'))->get();
        $command=Commande::find($id);
        //dd($client);
        $command->delete();
        return response()->json('Removed successfully.');
    }

    // Afficher Commande

    public function index(){
        $commands  = Commande::all();
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
