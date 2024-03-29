<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 12/19/2017
 * Time: 1:11 PM
 */

namespace App;


class Unsubscribe extends Subscription
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

    const TOKEN = 'vP4CPVPhNQ0lcYma4VchRqo9lpRNEPGzBcylIfKayFI=';

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
    private function unsubscribe($unsubscribeRequestList)
    {

        $response = $this->curlRequest($unsubscribeRequestList, self::UNSUBSCRIBE_ENDPOINT);
        if($response != null){
            $unsubscribeResponse = new UnsubscribeResponse($response);
            if ($unsubscribeResponse->success()){
                return $unsubscribeResponse;
            } else {
                $error = $this->errorHandler($unsubscribeResponse->statusCode);
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
    public function unsubscribeRequest()
    {

        $unsubscribeRequestList = [
            'Username'      => self::USERNAME,
            'Password'      => self::PASSWORD,
            'ANI'           => $this->ani,
            'ServiceId'     => $this->serviceId,
        ];

        return $this->unsubscribe($unsubscribeRequestList);
    }
}