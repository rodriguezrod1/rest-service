<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use RicorocksDigitalAgency\Soap\Facades\Soap;

class SoapClientController extends Controller
{
    protected $soapClient;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->soapClient = new \SoapClient('http://localhost:8001/soap?wsdl', [
            'trace' => 1,
            'exceptions' => true,
            'stream_context' => stream_context_create([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]),
        ]);
    }

    public function registerClient(Request $request)
    {
        try {
            $response = $this->soapClient->registerClient([
                'document' => $request->input('document'),
                'names' => $request->input('names'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ]);

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function loadWallet(Request $request)
    {
        try {
            $response = $this->soapClient->RechargeWallet([
                'document' => $request->input('document'),
                'phone' => $request->input('phone'),
                'value' => $request->input('value'),
            ]);

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->soapClient->MakePayment([
                'sessionId' => $request->input('sessionId'),
                'amount' => $request->input('amount'),
            ]);

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function confirmPayment(Request $request)
    {
        try {
            $response = $this->soapClient->ConfirmPayment([
                'sessionId' => $request->input('sessionId'),
                'token' => $request->input('token'),
            ]);

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkBalance(Request $request)
    {
        try {
            $response = $this->soapClient->checkBalance([
                'document' => $request->input('document'),
                'phone' => $request->input('phone'),
            ]);

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
