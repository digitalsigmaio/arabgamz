<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 12/19/2017
 * Time: 1:11 PM
 */

namespace App;


class SendSMS extends Subscription
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
    /**
     * Message to be sent to the end user
     *
     * @var string
     */
    public $messageBody;



    public function __construct(string $ani, string $messageBody)
    {
        $textList = $this->encrypt([
            $ani,
            self::SERVICE_ID,
            $messageBody,

        ]);

        if($textList){
            $this->ani         = $textList[0];
            $this->serviceId   = $textList[1];
            $this->messageBody  = $textList[2];
        }

    }

    /*
     * Sending sendSMS request to Vlink
     *
     * @param array $sendSmsRequestList
     * @return App\SendSMSResponse | bool
     * */
    private function sendSms($sendSmsRequestList)
    {

        $response = $this->curlRequest($sendSmsRequestList, self::SEND_SMS_ENDPOINT);
        if($response != null){
            $sendSmsResponse = new SendSMSResponse($response);
            if ($sendSmsResponse->success()){
                return $sendSmsResponse;
            } else {
                $error = $this->errorHandler($sendSmsResponse->statusCode);
                return $error;
            }
        }
        return null;

    }

    /*
     * Setting sendSmsList
     *
     * @param void
     * @return App\SendSMSResponse | bool
     * */
    public function sendSmsRequest()
    {

        $sendSmsRequestList = [
            'Username'      => self::USERNAME,
            'Password'      => self::PASSWORD,
            'ANI'           => $this->ani,
            'ServiceId'     => $this->serviceId,
            'MessageBody'   => $this->messageBody
        ];

        return $this->sendSms($sendSmsRequestList);
    }


}