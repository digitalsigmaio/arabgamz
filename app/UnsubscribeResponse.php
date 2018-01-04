<?php

namespace App;



class UnsubscribeResponse extends Response
{

    /*
     * Not used
     *
     * @var string
     * */
    public $requestId;

    /*
     * Not used
     *
     * @var string
     * */
    public $currencyCode;

    /*
     * Not used
     *
     * @var string
     * */
    public $amount;

    /*
     * Not used
     *
     * @var string
     * */
    public $data;

    /**
     * UnsubscribeResponse constructor.
     * @param $response
     */
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
