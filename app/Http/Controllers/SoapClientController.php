<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

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
        $options = [
            'trace' => 1,
            'exceptions' => true,
            'stream_context' => stream_context_create([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]),
        ];

        $this->soapClient = new SoapClient('http://localhost:8001/soap?wsdll', $options);
    }



    public function registerClient(Request $request)
    {
        try {
            $response = $this->soapClient->__soapCall(
                'registerClient',
                [
                    [
                        'type' => 'string',
                        'value' => $request->input('document'),
                    ],
                    [
                        'type' => 'string',
                        'value' => $request->input('names'),
                    ],
                    [
                        'type' => 'string',
                        'value' => $request->input('email'),
                    ],
                    [
                        'type' => 'string',
                        'value' => $request->input('phone'),
                    ],
                ]
            );

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function loadWallet(Request $request)
    {
        try {
            $response = $this->soapClient->__soapCall(
                'RechargeWallet',
                [
                    [
                        'type' => 'string',
                        'value' => $request->input('document'),
                    ],
                    [
                        'type' => 'string',
                        'value' => $request->input('phone'),
                    ],
                    [
                        'type' => 'decimal',
                        'value' => $request->input('value'),
                    ],
                ]
            );

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function pay(Request $request)
    {
        try {
            $response = $this->soapClient->__soapCall(
                'MakePayment',
                [
                    [
                        'type' => 'string',
                        'value' => $request->input('sessionId'),
                    ],
                    [
                        'type' => 'decimal',
                        'value' => $request->input('amount'),
                    ],
                ]
            );

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function confirmPayment(Request $request)
    {
        try {
            $response = $this->soapClient->__soapCall(
                'ConfirmPayment',
                [
                    [
                        'type' => 'string',
                        'value' => $request->input('sessionId'),
                    ],
                    [
                        'type' => 'string',
                        'value' => $request->input('token'),
                    ],
                ]
            );

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function checkBalance(Request $request)
    {
        try {
            $response = $this->soapClient->__soapCall(
                'checkBalance',
                [
                    [
                        'type' => 'string',
                        'value' => $request->input('document'),
                    ],
                    [
                        'type' => 'string',
                        'value' => $request->input('phone'),
                    ],
                ]
            );

            return response()->json($response)->setStatusCode(200, 'OK');
        } catch (\SoapFault $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
