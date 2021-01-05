<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YenePay\Models\PDT;
use YenePay\CheckoutHelper;

class paymentcancel extends Controller
{
    //
    public function index(){

        $pdtToken = "YOUR_PDT_KEY_HERE";
        $pdtRequestType = "PDT";
        $pdtModel = new PDT($pdtToken);
        $pdtModel->setUseSandbox(true);
                
        if(isset($_GET["TransactionId"]))
            $pdtModel->setTransactionId($_GET["TransactionId"]);
        if(isset($_GET["MerchantOrderId"]))
            $pdtModel->setMerchantOrderId($_GET["MerchantOrderId"]);
            
        
        $helper = new CheckoutHelper();
        $result = $helper->RequestPDT($pdtModel);
        
        if($result['result'] == "SUCCESS"){
            $order_status = $result['Status'];
            if($order_status == 'Canceled')
            {
                //This means the payment is canceled. 
                //You can extract more information of the transaction from the $result array
                //You can now mark the order as "Canceled" here.
                return view('index');
            }
        }
        else{
            //This means the pdt request has failed.
            //possible reasons are 
                //1. the TransactionId is not valid
                //2. the PDT_Key is incorrect
        }

    }

}
