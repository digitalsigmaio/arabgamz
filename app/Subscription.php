<?php

namespace App;




class Subscription
{
    /*
     * Request endpoint
     *
     * @var string
     * */
    const REQUEST_ENDPOINT = "http://umvas.vlserv.com/BillingPlatformUAT/VLApi/api/BillingAPI/RequestPin";
    /*
     * Confirm endpoint
     *
     * @var string
     * */
    const CONFIRM_ENDPOINT = "http://umvas.vlserv.com/BillingPlatformUAT/VLApi/api/BillingAPI/ConfirmPin";
    /*
     * Unsubscribe endpoint
     *
     * @var string
     * */
    const UNSUBSCRIBE_ENDPOINT = "https://umvas.vlserv.com/BillingPlatform/VLApi/api/SubscriptionAPI/unSubscribe";
    /*
     * SMS endpoint
     *
     * @var string
     * */
    const SEND_SMS_ENDPOINT = "https://umvas.vlserv.com/BillingPlatform/VLApi/api/SubscriptionAPI/SendSMS";
    /*
     * GetStatus endpoint
     *
     * @var string
     * */
    const GET_STATUS_ENDPOINT = "https://umvas.vlserv.com/BillingPlatform/VLApi/api/SubscriptionAPI/GetStatus";
    /*
     * Encryption endpoint
     *
     * @var string
     * */
    const ENCRYPTION_ENDPOINT = "http://umvas.vlserv.com/BillingPlatformUAT/VLApi/api/EncryptionMethodsAPI/Encrypt";
    /*
     * Decryption endpoint
     *
     * @var string
     * */
    const DECRYPTION_ENDPOINT = "http://umvas.vlserv.com/BillingPlatformUAT/VLApi/api/EncryptionMethodsAPI/Decrypt";
    /*
     * Success status code
     *
     * @var string
     * */
    const SUCCESS = "0";
    /*
     * Orange code
     *
     * @var string
     * */
    const ORANGE = "1";
    /*
     * Vodafone code
     *
     * @var string
     * */
    const VODAFONE = "2";
    /*
     * Etisalat code
     *
     * @var string
     * */
    const ETISALAT = "3";
    /*
     * Egypt country code
     *
     * @var string
     * */
    const EGYPT_KEY = "2";
    /*
     * Orange key number
     *
     * @var string
     * */
    const ORANGE_KEY = "012";
    /*
     * Vodafone key number
     *
     * @var string
     * */
    const VODAFONE_KEY = "010";
    /*
     * Etisalat key number
     *
     * @var string
     * */
    const ETISALAT_KEY = "011";
    /*
     * Username for Vlink api
     *
     * @var string
     * */
    const USERNAME = "x2iPSjx07Rg=";
    /*
     * Password for Vlink api
     *
     * @var string
     * */
    const PASSWORD = "jv/9RKzurfnadheSJeYwjw==";
    /*
     * Language id for Arabic language
     *
     * @var string
     * */
    const LANGUAGE_ID = "1";
    /*
     * Service id for http://arabgamz.com
     *
     * @var string
     * */
    const SERVICE_ID = "3423";
    /*
     * Token type value for "One Time Use"
     *
     * @var string
     * */
    const TOKEN_TYPE = "1";
    /*
     * Service type value for "Subscription"
     *
     * @var string
     * */
    const SERVICE_TYPE = "2";
    /*
     * Charge type value for "Without Charging"
     *
     * @var string
     * */
    const CHARGE_TYPE = "1";
    /*
     * Default headers for HttpRequest
     *
     * @var array
     * */
    const HEADERS = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'cache-control' => 'no-cache'
    ];

    public $pinCode;

    /*
     * Send data to encryption endpoint
     *
     * @param array $textlist
     * @return array | bool
     * */
    public function encrypt($textList)
    {
        /*
         * Fields required for encryption request
         *
         * @var array
         * */
        $body = [
            "Username" => self::USERNAME,
            "Password" => self::PASSWORD,
            "TextList" => $textList
        ];

        $result = $this->curlRequest($body);

        if($result){
            if ($result->StatusCode == self::SUCCESS){
                dd($result);
                // return $result->TextList;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*
     * Send data to decryption endpoint
     *
     * @param array $textlist
     * @return array | bool
     * */
    public function decrypt($textList)
    {
        /*
         * Fields required for decryption request
         *
         * @var array
         * */
        $body = [
            "Username" => self::USERNAME,
            "Password" => self::PASSWORD,
            "TextList" => $textList
        ];

        $result = $this->curlRequest($body);

        if($result){
            if ($result->StatusCode == self::SUCCESS){
                return $result->TextList;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*
     * Send HttpRequest for Vlink api
     * @param array
     * @return array | bool
     * */
    protected function curlRequest($body)
    {
        /*
         * HttpRequest with cURL protocol
         * */
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::ENCRYPTION_ENDPOINT);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));

        $response = curl_exec($ch);

        curl_close($ch);
        if($response){
            return json_decode($response);
        } else {
            return false;
        }
    }

}
