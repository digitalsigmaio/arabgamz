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
     * @var object $response
     * @return void
     * */
    public function __construct(object $response)
    {
        $this->statusCode = $response->StatusCode;
        $this->text = $response->Text;
        $this->requestId = $response->RequestId;
        $this->currencyCode = $response->CurrencyCode;
        $this->amount = $response->Amount;
        $this->data = $response->Data;
    }
}
