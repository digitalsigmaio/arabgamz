<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 12/19/2017
 * Time: 1:11 PM
 */

namespace App;


class RequestPin extends Subscription
{
    /*
     * The mobile number for the end user
     *
     * @var string
     * */
    public $ani;
    /*
     * Default operator id registered in Vlink
     *
     * @var string
     * */
    public $operatorId;
    /*
     * Username for Vlink api
     *
     * @var string
     * */
    public $username;
    /*
     * Password for Vlink api
     *
     * @var string
     * */
    public $password;
    /*
     * Language id for Arabic language
     *
     * @var string
     * */
    public $languageId;
    /*
     * Service id for http://arabgamz.com
     *
     * @var string
     * */
    public $serviceId;
    /*
     * Token type value for "One Time Use"
     *
     * @var string
     * */
    public $tokenType;
    /*
     * Service type value for "Subscription"
     *
     * @var string
     * */
    public $serviceType;

    /*
     * Create new RequestPin instance
     *
     * @param string $ani
     * @param string $operator_id
     * @return void*/
    public function __construct(string $ani, string $operator_id)
    {
        $textList = $this->encrypt([
            $ani,
            self::LANGUAGE_ID,
            $operator_id,
            self::SERVICE_ID,
            self::TOKEN_TYPE,
            self::SERVICE_TYPE
        ]);

        if($textList){
            $this->ani         = $textList[0];
            $this->languageId  = $textList[1];
            $this->operatorId  = $textList[2];
            $this->serviceId   = $textList[3];
            $this->tokenType   = $textList[4];
            $this->serviceType = $textList[5];
        }

    }

    /*
     * Sending requestPin to Vlink
     *
     * @param array $requestPinList
     * @return App\RequestPinResponse | bool
     * */
    private function requestPin($requestPinList)
    {

        $response = $this->curlRequest($requestPinList, self::REQUEST_ENDPOINT);
        if($response != null){
            $requestPinResponse = new RequestPinResponse($response);
            if ($requestPinResponse->success()){
                return $requestPinResponse;
            } else {
                $error = $this->errorHandler($requestPinResponse->statusCode);
                return $error;
            }
        }
        return null;

    }

    /*
     * Setting requestPinList
     *
     * @param void
     * @return App\RequestPinResponse | bool
     * */
    public function sendRequestPin()
    {

        $requestPinList = [
            'Username'      => self::USERNAME,
            'Password'      => self::PASSWORD,
            'ANI'           => $this->ani,
            'LanguageId'    => $this->languageId,
            'OperatorId'    => $this->operatorId,
            'ServiceId'     => $this->serviceId,
            'TokenType'     => $this->tokenType,
            'ServiceType'   => $this->serviceType
        ];
        return $this->requestPin($requestPinList);

    }
}