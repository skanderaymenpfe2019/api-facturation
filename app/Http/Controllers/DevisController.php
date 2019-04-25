<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF ;

use Mail ;

class DevisController extends Controller
{

    // Créer Devis

    public function createDevis(Request $request)
    {
        $devis = Devis::create($request->all());
        return response()->json($quotations);
    }

    // Mis-a-jour Devis

    public function updateDevis(Request $request, $id)
    {
        $quotations = DB:: table('quotations')->where('id',$request->input('id'))->get();
        $quotations->client_id = $request->input('client_id');
        $quotations->ref = $request->input('ref');
        $quotations->regulation = $request->input('regulation');
        $quotations->remark = $request->input('remark');
        $quotations->date = $request->input('date');
        $quotations->date_deadline = $request->input('date_deadline');
        $quotations->ref_client = $request->input('ref_client');
        $quotations->name = $request->input('name');
        $quotations->email = $request->input('email');
        $quotations->adress = $request->input('adress');
        $quotations->postcode = $request->input('postcode');
        $quotations->city = $request->input('city');
        $quotations->tva_client = $request->input('tva_client');
        $quotations->country_id = $request->input('country_id');
        $quotations->phone = $request->input('phone');
        $quotations->fax = $request->input('fax');
        $quotations->payment_mdoe = $request->input('payment_mode');
        $quotations->total_price = $request->input('total_price');
        $quotations->advance = $request->input('advance');
        $quotations->invoiced = $request->input('invoiced');
        $quotations->status = $request->input('status');
        $quotations->currency_id = $request->input('currency_id');
        $quotations->save();
           $response["quotations"] = $quotations;
           $response["success"] = 1;
        return response()->json($response);
    }

    // Supprimer Devis

    public function deleteDevis($id){
        $quotations  = DB::table('quotations')->where('id',$request->input('id'))->get();
        $quotations->delete();
        return response()->json('Removed successfully.');
    }

     // Afficher Devis

     public function index(){
        $quotations  = Devis::all();
           $response["quotations"] = $quotations;
           $response["success"] = 1;
        return response()->json($response);
    }

    // Aeprcue en PDF
    
    public function generatePDF(){
        $data = ['title' =>'Cher Client, Veuillez trouver en annexe votre devis , tout en sachant que nous y avons intégrée les meilleurs conditions tarifaire , ajustée a votre demande de renseignement , au plaisir de vous conduire , bien à vous merci .'];
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

      // Créer une Bons de Commande

    public function createCommande(){
        redirect()->action('CommandeController@createCommande')->where('id',$request->input('id'))->get();
    }
}