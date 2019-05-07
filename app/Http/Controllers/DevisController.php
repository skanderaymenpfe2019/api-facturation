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
        $quotation->client_id = $request->input('client_id');
        $quotation->ref = $request->input('ref');
        $quotation->regulation = $request->input('regulation');
        $quotation->remark = $request->input('remark');
        $quotation->date = $request->input('date');
        $quotation->date_deadline = $request->input('date_deadline');
        $quotation->ref_client = $request->input('ref_client');
        $quotation->name = $request->input('name');
        $quotation->email = $request->input('email');
        $quotation->adress = $request->input('adress');
        $quotation->postcode = $request->input('postcode');
        $quotation->city = $request->input('city');
        $quotation->tva_client = $request->input('tva_client');
        $quotation->country_id = $request->input('country_id');
        $quotation->phone = $request->input('phone');
        $quotation->fax = $request->input('fax');
        $quotation->payment_mdoe = $request->input('payment_mode');
        $quotation->total_price = $request->input('total_price');
        $quotation->advance = $request->input('advance');
        $quotation->invoiced = $request->input('invoiced');
        $quotation->status = $request->input('status');
        $quotation->currency_id = $request->input('currency_id');
        $quotation->save();
           $response["quotations"] = $quotations;
           $response["success"] = 1;
        return response()->json($response);
    }

    // Supprimer Devis

    public function deleteDevis($id){
        $quotation  = DB::table('quotations')->where('id',$request->input('id'))->get();
        $quotation->delete();
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
