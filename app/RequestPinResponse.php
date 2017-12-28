<?php

namespace App;



class RequestPinResponse extends Response
{
    /*
     * Default code for "EmptyUserNameOrPassword" response
     *
     * @var string
     * */
    const  EMPTY_USERNAME_OR_PASSWORD = "1";

    /*
     * Status code for response
     *
     * @var string
     * */
    public $statusCode;

    /*
     * Text describing status code
     *
     * @var string
     * */
    public $text;

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
     * Create new instance of RequestPinResponse
     *
     * @param object $data
     * @return void
     * */
    public function __construct($response)
    {
        $textList = $this->decrypt([
            $response->StatusCode,
            $response->Text,
            $response->RequestId,
            $response->CurrencyCode,
            $response->Amount
        ]);

        $this->statusCode   = $textList[0];
        $this->text         = $textList[1];
        $this->requestId    = $textList[2];
        $this->currencyCode = $textList[3];
        $this->amount       = $textList[4];
    }


}
