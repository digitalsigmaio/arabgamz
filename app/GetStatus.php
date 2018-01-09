<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 12/19/2017
 * Time: 1:11 PM
 */

namespace App;


class GetStatus extends Subscription
{
    /*
     * The mobile number for the end user
     *
     * @var string
     * */
    public $ani;
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
     * Service id for http://arabgamz.com
     *
     * @var string
     * */
    public $serviceId;



    public function __construct(string $ani)
    {
        $textList = $this->encrypt([
            $ani,
            self::SERVICE_ID
        ]);

        if($textList){
            $this->ani         = $textList[0];
            $this->serviceId   = $textList[1];
        }

    }

    /*
     * Sending unsubscribe request to Vlink
     *
     * @param array $unsubscribeRequestList
     * @return App\UnsubscribeResponse | bool
     * */
    private function getStatus($getStatusRequestList)
    {

        $response = $this->curlRequest($getStatusRequestList, self::GET_STATUS_ENDPOINT);
        if($response != null){
            $getStatusResponse = new GetStatusResponse($response);
            if ($getStatusResponse->success()){
                return $getStatusResponse;
            } else {
                $error = $this->errorHandler($getStatusResponse->statusCode);
                return $error;
            }
        }
        return null;

    }

    /*
     * Setting getStatusList
     *
     * @param void
     * @return App\GetStatusResponse | bool
     * */
    public function getStatusRequest()
    {

        $getStatusRequestList = [
            'Username'      => self::USERNAME,
            'Password'      => self::PASSWORD,
            'ANI'           => $this->ani,
            'ServiceId'     => $this->serviceId,
        ];

        return $this->getStatus($getStatusRequestList);
    }


}