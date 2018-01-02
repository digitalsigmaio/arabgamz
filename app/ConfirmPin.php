<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 12/19/2017
 * Time: 1:11 PM
 */

namespace App;


class ConfirmPin extends Subscription
{

    /*
     * Username for Vlink api
     *
     * @var string
     * */
    public $username = self::USERNAME;
    /*
     * Password for Vlink api
     *
     * @var string
     * */
    public $password = self::PASSWORD;
    /*
     * End user token
     *
     * @var string
     * */
    public $pinCode;
    /*
     * http://arabgamz.com request id for an end user
     *
     * @var string
     * */
    public $requestId;
    /*
     * Charge type value for "Without Charging"
     *
     * @var string
     * */
    public $chargeType;
    /*
     * Service type value for "Subscription"
     *
     * @var string
     * */
    private $confirmationMessage;

    /*
     * Create new RequestPin instance
     *
     * @param string $ani
     * @param string $operator_id
     * @return void*/
    public function __construct(string $requestId, string $pinCode)
    {
        $textList = $this->encrypt([
            $requestId,
            $pinCode,
            self::CHARGE_TYPE,
            self::CONFIRM_SMS
        ]);

        if($textList){
            $this->requestId            = $textList[0];
            $this->pinCode              = $textList[1];
            $this->chargeType           = $textList[2];
            $this->confirmationMessage  = $textList[3];
        }

    }

    /*
     * Sending confirmPin to Vlink
     *
     * @param array $confirmPinList
     * @return App\ConfirmPinResponse
     * */
    private function confirmPin($confirmPinList)
    {

        $response = $this->curlRequest($confirmPinList, self::CONFIRM_ENDPOINT);
        if($response != null){
            $confirmPinResponse = new ConfirmPinResponse($response);
            if ($confirmPinResponse->success()){
                return $confirmPinResponse;
            } else {
                $error = $this->errorHandler($confirmPinResponse->statusCode);
                return $error;
            }
        }

        return null;

    }

    /*
     * Setting ConfirmPinList
     *
     * @param void
     * @return App\ConfirmPinResponse | bool
     * */
    public function sendConfirmPin()
    {

        $confirmPinList = [
            'Username'              => self::USERNAME,
            'Password'              => self::PASSWORD,
            'PinCode'               => $this->pinCode,
            'RequestId'             => $this->requestId,
            'ChargeType'            => $this->chargeType,
            'ConfirmationMessage'   => $this->confirmationMessage,
        ];
        return $this->confirmPin($confirmPinList);
    }
}