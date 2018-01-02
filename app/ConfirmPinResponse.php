<?php

namespace App;



class ConfirmPinResponse extends Response
{
    /*
     * Default status code for insufficient funds
     *
     * @var string
     * */
    const  NO_CREDIT = "4";
    /*
     * Request id for http://arabgamz.com
     *
     * @var string
     * */
    public $requestId;
    /*
     * Currency code for transaction
     *
     * @var string
     * */
    public $currencyCode;
    /*
     * Amount of transactions in default currency
     *
     * @var string
     * */
    public $amount;
    /*
     * Extra data with response, default value null
     *
     * @var static
     * */
    public $data;

    /*
     * Create new instance of ConfirmPinResponse
     *
     * @var $response
     * @return void
     * */
    public function __construct($response)
    {
        $textList = $this->decrypt([
            $response->StatusCode,
            $response->Text,
            $response->RequestId,
            $response->CurrencyCode,
            $response->Amount,
            $response->Data
        ]);
        if ($textList){
            $this->statusCode   = $textList[0];
            $this->text         = $textList[1];
            $this->requestId    = $textList[2];
            $this->currencyCode = $textList[3];
            $this->amount       = $textList[4];
            $this->data         = $textList[5];
        }
    }
}
