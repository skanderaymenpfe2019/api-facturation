<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use PDF ;

class FactureController extends Controller
{
    public function createFacture(Request $request)
    {
        $factures = Facture::create($request->all());
        return response()->json($factures);
    }
    public function updateFacture($id,REQUEST $request)
    {
        //$facture = DB::table('invoices')->where('id',$request->input('id'))->get();
        $facture=Facture::find($id);
        $facture->client_id = $request->input('client_id');
        $facture->ref = $request->input('ref');
        $facture->regulation = $request->input('regulation');
        $facture->remark = $request->input('remark');
        $facture->date = $request->input('date');
        $facture->date_deadline = $request->input('date_deadline');
        $facture->ref_client = $request->input('ref_client');
        $facture->name = $request->input('name');
        $facture->email = $request->input('email');
        $facture->address = $request->input('address');
        $facture->postcode = $request->input('postcode');
        $facture->city = $request->input('city');
        $facture->tva_client = $request->input('tva_client');
        $facture->country_id = $request->input('country_id');
        $facture->phone = $request->input('phone');
        $facture->fax = $request->input('fax');
        $facture->payment_mode = $request->input('payment_mode');
        $facture->invoiced = $request->input('invoiced');
        $facture->status = $request->input('status');
        $facture->currency_id = $request->input('currency_id');

            $facture->save();
            $response["facture"] = $facture;
            $response["success"] = 1;
        return response()->json($response);
    }
    public function index()
    {
        $factures = Facture::all();
            $response["factures"] = $factures;
            $response["success"] = 1;
        return response()->json($response);
    }
    public function attachmentEMAIL() {
        $data = array('name'=>"CloudBill");
        Mail::send('mail', $data, function($message) {
           $message->to('abc@gmail.com', 'Tutorials Point')->subject
              ('Envoyer facture par mail');
           $message->attach('C:\wamp64\www\restapi\resources\views\myPDF.blade.php');
           $message->from('ssamoud76@gmail.com','CloudBill');
        });
        echo "Email Sent with attachment. Check your inbox.";
     }
     public function generatePDF(){
        $data = ['title' =>'Cher Client, Veuillez trouver en annexe votre facure , tout en sachant que nous y avons intégrée les meilleurs conditions tarifaire , ajustée a votre demande de renseignement , au plaisir de vous conduire , bien à vous merci .'];
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('myPDF.blade.pdf');
    }
    public function paiement()
    {
        redirect()->action('ReglementController@createReglement')->where('id',$request->input('id'))->get();
    }
    public function createNoteDeCredit()
    {
        redirect()->action('NoteCreditController@createNote')->where('id',$request->input('id'))->get();
    }
}
