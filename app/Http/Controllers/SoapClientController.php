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
        $this->soapClient = new SoapClient('http://localhost:8001/soap?wsdl');
    }


    public function registerClient(Request $request)
    {
        $response = $this->soapClient->__soapCall('registerClient', [
            $request->input('document'),
            $request->input('names'),
            $request->input('email'),
            $request->input('cellphone')
        ]);

        return response()->json($response);
    }



    public function loadWallet(Request $request)
    {
        $response = $this->soapClient->__soapCall('RechargeWallet', [
            $request->input('document'),
            $request->input('phone'),
            $request->input('value')
        ]);

        return response()->json($response);
    }



    public function pay(Request $request)
    {
        $response = $this->soapClient->__soapCall('MakePayment', [
            $request->input('sessionId'),
            $request->input('amount')
        ]);

        return response()->json($response);
    }



    public function confirmPayment(Request $request)
    {
        $response = $this->soapClient->__soapCall('ConfirmPayment', [
            $request->input('sessionId'),
            $request->input('token')
        ]);

        return response()->json($response);
    }



    public function checkBalance(Request $request)
    {
        $response = $this->soapClient->__soapCall('checkBalance', [
            $request->input('document'),
            $request->input('cellphone')
        ]);

        return response()->json($response);
    }
}
