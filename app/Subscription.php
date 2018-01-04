<?php

namespace App;




use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

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

    /***********************
     * COMMON ERRORS
     ***********************/

    /*
     * The process done successfully
     *
     * @var string
     * */
    const SUCCESS = "0";
    /**
     * Third party didn't enter the User name or password
     *
     * @var string
     */
    const EMPTY_USERNAME_OR_PASSWORD = "1";
    /**
     * General error
     *
     * @var string
     */
    const ERROR = "7";
    /**
     * Third party didn't enter service sender name in admin tool
     *
     * @var string
     */
    const EMPTY_SERVICE_SENDER_NAME = "9";
    /**
     * Third Party entered an invalid language code
     *
     * @var string
     */
    const INVALID_LANGUAGE = "12";
    /**
     * Third party entered invalid User name or password
     *
     * @var string
     */
    const INVALID_USERNAME_OR_PASSWORD = "14";
    /**
     * Third party entered invalid operator ID
     *
     * @var string
     */
    const INVALID_OPERATOR_ID = "15";
    /**
     * Third party entered more than 11 character in service
     * sender name in the service settings
     *
     * @var string
     */
    const INVALID_SERVICE_SENDER_NAME_LENGTH = "17";
    /**
     * Third Party entered Invalid Service ID
     *
     * @var string
     */
    const INVALID_SERVICE_ID = "19";
    /**
     * The third party don't have permission with the API or the operator
     *
     * @var string
     */
    const ACCESS_DENIED = "20";
    /**
     * Third Party IP is not valid
     *
     * @var string
     */
    const INVALID_USER_IP = "21";
    /**
     * Third Party didn't enter Service ID
     *
     * @var string
     */
    const EMPTY_SERVICE_ID = "22";
    /**
     * The Third-Party tried to do an operation on an expired service
     *
     * @var string
     */
    const SERVICE_EXPIRED = "46";

    /***********************
     * REQUEST PIN ERRORS
     ***********************/

    /**
     * Third Party didn't enter Operator ID
     *
     * @var string
     */
    const EMPTY_OPERATOR_ID = "2";
    /**
     * Third Party sent Invalid ANI
     *
     * @var string
     */
    const INVALID_ANI = "3";
    /**
     * Third party entered 0 amount for the service in admin tool
     *
     * @var string
     */
    const INVALID_AMOUNT = "8";
    /**
     * Third party didn't enter an ANI
     *
     * @var string
     */
    const EMPTY_ANI = "16";
    /**
     * Third-Party sent empty or bad formatted JSON/XML
     *
     * @var string
     */
    const WRONG_FORMAT = "18";
    /**
     * Number of fraud max requests per one minute
     *
     * @var string
     */
    const FRAUD_MAX_REQUEST_PER_ONE_MINUTE = "25";
    /**
     * Number of fraud max requests per one day
     *
     * @var string
     */
    const FRAUD_MAX_REQUEST_PER_ONE_DAY = "26";
    /**
     * If end user blocked because of one of the fraud cases
     *
     * @var string
     */
    const BLOCKED_USER_AND_ANI = "28";
    /**
     * The Third-Party tried to charge the end-user silently in a service
     * does not support this option
     *
     * @var string
     */
    const NON_SILENT_CHARGING_SERVICE = "30";
    /**
     * The Third-Party does not have the permission to charge the end-user silently
     *
     * @var string
     */
    const NO_SILENT_CHARGING_PERMISSION = "34";
    /**
     * The Third Party sent an invalid TokenReuse value
     *
     * @var string
     */
    const INVALID_TOKEN_TYPE = "36";
    /**
     * The Third-Party tries to send incorrect service type value
     *
     * @var string
     */
    const INVALID_SERVICE_TYPE = "44";
    /**
     * The Third-Party try to request pin for a black listed Mobile Number
     *
     * @var string
     */
    const BLACK_LISTED_ANI = "45";

    /*******************************
     * REQUEST AND CONFIRM PIN ERROR
     *******************************/

    /**
     * The End-User already subscribe in a service, and The Third-Party tries to resubscribe him
     * in that service
     *
     * @var string
     */
    const ALREADY_SUBSCRIBED_IN_SERVICE = "56";

    /*****************************
     * CONFIRM PIN ERRORS
     *****************************/

    /**
     * No credit or check subscription SMS sent to the submitted dial
     *
     * @var string
     */
    const NO_CREDIT = "4";
    /**
     * When the End-User try to enter the Token, he/she may write it wrong,
     * the system responses with InvalidPIN.
     * The system will allow the End-User to make only two trails to enter the right one,
     * then the Token will be expired.
     *
     * @var string
     */
    const INVALID_PIN = "6";
    /**
     * The operator (Orange or Etisalat) didn't charge the ANI
     *
     * @var string
     */
    const INSUFFICIENT_BALANCE = "10";
    /**
     * Third Party entered an invalid request ID
     *
     * @var string
     */
    const INVALID_REQUEST_ID = "11";
    /**
     * The End User entered an expired Token.
     * The Token maybe expired based on the following cases:
     *  After 10 minutes of receiving the Token without usage.
     *  The End-User makes more than two trails to enter the right Token (Not in the same minute).
     *
     * @var string
     */
    const PINCODE_EXPIRED = "13";
    /**
     * Third Party didn't enter Request ID
     *
     * @var string
     */
    const EMPTY_REQUEST_ID = "23";
    /**
     * Third Party didn't enter Token
     *
     * @var string
     */
    const EMPTY_PINCODE = "24";
    /**
     * The end-user tried to enter a Token (Right or Wrong), and
     * the Third-Party sent it with a Request ID that has been charged successfully
     * (In a service does not support silently charging).
     * The system will response with "AlreadyUsed"
     *
     * @var string
     */
    const ALREADY_USED = "29";
    /**
     * The Third-Party tried to charge the end-user silently in an expired service subscription.
     *
     * @var string
     */
    const SILENT_CHARGING_TOKEN_EXPIRED = "32";
    /**
     * The Third-Party tried to confirm pin without charge the end-user in
     * a service does not support this option
     *
     * @var string
     */
    const NON_WITHOUT_CHARGING_SERVICE = "33";
    /**
     * The Third-Party does not have the permission to confirm pin without charging.
     *
     * @var string
     */
    const NON_CONFIRM_WITHOUT_CHARGING_PERMISSION = "35";
    /**
     * The Third Party sent an invalid WithoutCharging value
     *
     * @var string
     */
    const INVALID_CHARGE_TYPE = "37";

    /**********************
     * SUBSCRIBE ERROR
     **********************/

    /**
     * The Third-Party tries to send multiple subscription request with the same parameter
     *
     * @var string
     */
    const ALREADY_ADDED_SUBSCRIPTION_REQUEST = "38";

    /********************************
     * UNSUBSCRIBE OR SEND SMS ERROR
     ********************************/

    /**
     * The Third-Party tries to unsubscribe ANI from a service or
     * send him SMS message while the ANI is not subscribed to it
     *
     * @var string
     */
    const ANI_NOT_SUBSCRIBED_ON_SERVICE = "42";

    /**********************
     * GET STATUS ERRORS
     **********************/

    /**
     * The difference between the start index number and the end index number
     * which sent by the Third-Party is greater than 10
     *
     * @var string
     */
    const INVALID_PAGE_SIZE = "39";
    /**
     * The Third-Party tries to enter non-numeric values
     *
     * @var string
     */
    const INVALID_SUBSCRIPTION_STATUS_START_OR_END_INDEX = "40";
    /**
     * The Third-Party tries to send start index number greater than the end index number
     *
     * @var string
     */
    const START_INDEX_SHOULD_BE_LESS_THAN_END_INDEX = "41";

    /****************************
     * ENCRYPT, DECRYPT ERROR
     ****************************/

    /**
     * The Third party tries to send text list with wrong format
     *
     * @var string
     */
    const INVALID_TEXT_LIST = "53";

    /*******************
     * SEND SMS ERRORS
     *******************/

    /**
     * The Third-Party tries to send SMS without text in the message body
     *
     * @var string
     */
    const EMPTY_MESSAGE_BODY = "57";
    /**
     * The Third-Party tries to send SMS without text in the message body
     *
     * @var string
     */
    const INVALID_MESSAGE_BODY = "58";

    /***************************/

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
        'Accept: application/json',
        'Content-Type: application/json',
        'Cache-Control: no-cache',
    ];

    /**
     * List of third party errors
     *
     * @var array
     */
    private static $commonErrors = [
        self::EMPTY_USERNAME_OR_PASSWORD                => "Third party didn't enter the User name or password",
        self::ERROR                                     => "General error",
        self::EMPTY_SERVICE_SENDER_NAME                 => "Third party didn't enter service sender name in admin tool",
        self::INVALID_LANGUAGE                          => "Third Party entered an invalid language code",
        self::INVALID_USERNAME_OR_PASSWORD              => "Third party entered invalid User name or password",
        self::INVALID_OPERATOR_ID                       => "Third party entered invalid operator ID",
        self::INVALID_SERVICE_SENDER_NAME_LENGTH        => "Third party entered more than 11 character in service sender name in the service settings",
        self::INVALID_SERVICE_ID                        => "Third Party entered Invalid Service ID",
        self::ACCESS_DENIED                             => "The third party don't have permission with the API or the operator",
        self::INVALID_USER_IP                           => "Third Party IP is not valid",
        self::EMPTY_SERVICE_ID                          => "Third Party didn't enter Service ID",
        self::SERVICE_EXPIRED                           => "Third Party didn't enter Operator ID",
        ];
    /**
     * List of request pin errors
     *
     * @var array
     */
    private static $requestPinErrors = [
        self::EMPTY_OPERATOR_ID                         => "خطأ فى تحديد شركة الإتصالات التابع لها",
        self::INVALID_ANI                               => "الرقم الذي أدخلته غير صحيح يرجى التأكد من صحة الرقم",
        self::INVALID_AMOUNT                            => "Third party entered 0 amount for the service in admin tool",
        self::EMPTY_ANI                                 => "من فضلك أعد ملء بياناتك مرة أخرى",
        self::WRONG_FORMAT                              => "Third-Party sent empty or bad formatted JSON/XML",
        self::FRAUD_MAX_REQUEST_PER_ONE_MINUTE          => "Number of fraud max requests per one minute",
        self::FRAUD_MAX_REQUEST_PER_ONE_DAY             => "Number of fraud max requests per one day",
        self::BLOCKED_USER_AND_ANI                      => "هذا الرقم لا يحق له أستخدام الخدمة مرة أخرى",
        self::NON_SILENT_CHARGING_SERVICE               => "The Third-Party tried to charge the end-user silently in a service does not support this option ",
        self::NO_SILENT_CHARGING_PERMISSION             => "The Third-Party does not have the permission to charge the end-user silently",
        self::INVALID_TOKEN_TYPE                        => "The Third Party sent an invalid TokenReuse value ",
        self::INVALID_SERVICE_TYPE                      => "The Third-Party tries to send incorrect service type value ",
        self::BLACK_LISTED_ANI                          => "هذا الرقم ممنوع من الخدمة",
        self::ALREADY_SUBSCRIBED_IN_SERVICE             => "هذا الرقم مشترك بالفعل بالخدمة",
        ];
    /**
     * List of confirm pin errors
     *
     * @var array
     */
    private static $confirmPinErrors = [
        self::NO_CREDIT                                 => "No credit or check subscription SMS sent to the submitted dial",
        self::INVALID_PIN                               => "ال Pin Code الذى ادخلته غير صحيح",
        self::INSUFFICIENT_BALANCE                      => "رصيدك غير كافي لإتمام عملية الإشتراك",
        self::INVALID_REQUEST_ID                        => "Third Party entered an invalid request ID",
        self::PINCODE_EXPIRED                           => "هذا ال Pin Code منتهي الصلاحية أعد طلب ال Pin Code",
        self::EMPTY_REQUEST_ID                          => "Third Party didn't enter Request ID ",
        self::EMPTY_PINCODE                             => "Third Party didn't enter Token",
        self::ALREADY_USED                              => "هذا ال Pin Code تم أستخدامه من قبل",
        self::SILENT_CHARGING_TOKEN_EXPIRED             => "The Third-Party tried to charge the end-user silently in an expired service subscription.",
        self::NON_WITHOUT_CHARGING_SERVICE              => "The Third-Party tried to confirm pin without charge the end-user in a service does not support this option ",
        self::NON_CONFIRM_WITHOUT_CHARGING_PERMISSION   => "The Third-Party does not have the permission to confirm pin without charging",
        self::INVALID_CHARGE_TYPE                       => "The Third Party sent an invalid WithoutCharging value ",
        ];
    /**
     * List of subscribe errors
     *
     * @var array
     */
    private static $subscribeErrors = [
        self::ALREADY_ADDED_SUBSCRIPTION_REQUEST        => "تم أرسال طلب أشتراك بالفعل",
        ];
    /**
     * List of unsubscribe errors
     *
     * @var array
     */
    private static $unsubscribeErrors = [
        self::ANI_NOT_SUBSCRIBED_ON_SERVICE             => "هذا الرقم غير مشترك بالخدمة",
        ];
    /**
     * List of get status errors
     *
     * @var array
     */
    private static $getStatus = [
        self::INVALID_PAGE_SIZE                         => "The difference between the start index number and the end index number which
                                                            sent by the Third-Party is greater than 10 ",
        self::INVALID_SUBSCRIPTION_STATUS_START_OR_END_INDEX => "The Third-Party tries to enter non-numeric values",
        self::START_INDEX_SHOULD_BE_LESS_THAN_END_INDEX => "The Third-Party tries to send start index number greater than the end index number",
        ];
    /**
     * List of send sms errors
     *
     * @var array
     */
    private static $sendSmsError = [
        self::EMPTY_MESSAGE_BODY                        => "The Third-Party tries to send SMS without text in the message body",
        self::INVALID_MESSAGE_BODY                      => "The Third-Party tries to send SMS with an invalid encrypted data",
    ];

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

        $result = $this->curlRequest($body, self::ENCRYPTION_ENDPOINT);

        if(isset($result->StatusCode)){
            if ($result->StatusCode == self::SUCCESS) {
                return $result->TextList;
            } elseif ($result->StatusCode == self::INVALID_TEXT_LIST) {
                Log::useDailyFiles(storage_path() . '/logs/decryptionErrors.log');
                Log::info([
                    'error_code' => self::INVALID_TEXT_LIST,
                    'text_list' => $body,
                ]);
                return false;
            } else {
                    return false;
                }
        } else {
            Log::useDailyfiles(storage_path() . '/logs/httpRequestErrors.log');
            Log::info([
                'error' => $result,
            ]);
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
            "TextList" => $textList,
        ];

        $result = $this->curlRequest($body, self::DECRYPTION_ENDPOINT);

        if(isset($result->StatusCode)) {
            if ($result->StatusCode == self::SUCCESS) {
                return $result->TextList;
            } elseif ($result->StatusCode == self::INVALID_TEXT_LIST) {
                Log::useDailyFiles(storage_path() . '/logs/decryptionErrors.log');
                Log::info([
                    'error_code' => self::INVALID_TEXT_LIST,
                    'text_list' => $body,
                ]);
                return false;
            } else {
                return false;
            }
        } else {
            Log::useDailyfiles(storage_path() . '/logs/httpRequestErrors.log');
            Log::info([
                'error' => $result,
            ]);
            return false;
        }
    }

    /*
     * Send HttpRequest for Vlink api
     * @param array
     * @return array | bool
     * */
    protected function curlRequest(array $body, string $url)
    {
        /*
         * HttpRequest with cURL protocol
         * */


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => self::HEADERS,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        if($response){
            return json_decode($response);
        } else {
            $x = new HttpResponseException($response);
            Log::useDailyfiles(storage_path() . '/logs/httpRequestErrors.log');
            Log::info([
                'error' => $x,
            ]);
            return null;
        }
    }

    /**
     * Handle response errors
     *
     * @param string $status_code
     * @return string
     */
    protected function errorHandler(string $status_code)
    {
        if ($status_code != "0" || $status_code != null) {
            foreach (self::$commonErrors as $key => $value) {
                if ($status_code == $key) {
                    Log::useDailyfiles(storage_path() . '/logs/serverErrors.log');
                    Log::info([
                        'error' => $value,
                    ]);

                    return 'خطأ في النظام حاول مرة أخرى بعد قليل';
                }
            }

            foreach (self::$requestPinErrors as $key => $value) {
                if ($status_code == $key) {
                    if (
                        $key == self::INVALID_AMOUNT ||
                        $key == self::WRONG_FORMAT ||
                        $key == self::FRAUD_MAX_REQUEST_PER_ONE_MINUTE ||
                        $key == self::FRAUD_MAX_REQUEST_PER_ONE_DAY ||
                        $key == self::NON_SILENT_CHARGING_SERVICE ||
                        $key == self::NO_SILENT_CHARGING_PERMISSION ||
                        $key == self::INVALID_TOKEN_TYPE ||
                        $key == self::INVALID_SERVICE_TYPE
                    ) {
                        Log::useDailyfiles(storage_path() . '/logs/requestPinErrors.log');
                        Log::info([
                            'error' => $value,
                        ]);

                        return 'خطأ في النظام حاول مرة أخرى بعد قليل';
                    } else {
                        return $value;
                    }
                }
            }

            foreach (self::$confirmPinErrors as $key => $value) {
                if ($status_code == $key) {
                    if (
                        $key == self::NO_CREDIT ||
                        $key == self::INVALID_REQUEST_ID ||
                        $key == self::PINCODE_EXPIRED ||
                        $key == self::EMPTY_REQUEST_ID ||
                        $key == self::EMPTY_PINCODE ||
                        $key == self::SILENT_CHARGING_TOKEN_EXPIRED ||
                        $key == self::NON_WITHOUT_CHARGING_SERVICE ||
                        $key == self::NON_CONFIRM_WITHOUT_CHARGING_PERMISSION ||
                        $key == self::INVALID_CHARGE_TYPE
                    ) {
                        Log::useDailyfiles(storage_path() . '/logs/confirmPinErrors.log');
                        Log::info([
                            'error' => $value,
                        ]);

                        return 'خطأ في النظام حاول مرة أخرى بعد قليل';
                    } else {
                        return $value;
                    }
                }
            }


            foreach (self::$subscribeErrors as $key => $value) {
                if ($status_code == $key) {
                    return $value;
                }
            }

            foreach (self::$unsubscribeErrors as $key => $value) {
                if ($status_code == $key) {
                    return $value;
                }
            }

            foreach (self::$getStatus as $key => $value) {
                if ($status_code == $key) {
                    Log::useDailyfiles(storage_path() . '/logs/getStatusErrors.log');
                    Log::info([
                        'error' => $value,
                    ]);

                    return 'خطأ في النظام حاول مرة أخرى بعد قليل';
                }
            }

            foreach (self::$sendSmsError as $key => $value) {
                if ($status_code == $key) {
                    Log::useDailyfiles(storage_path() . '/logs/sendSmsErrors.log');
                    Log::info([
                        'error' => $value,
                    ]);

                    return 'خطأ في النظام حاول مرة أخرى بعد قليل';
                }
            }
        } else {
            Log::useDailyfiles(storage_path() . '/logs/serverErrors.log');
            Log::info([
                'error' => 'Undefined server error',
            ]);
            return 'خطأ في النظام حاول مرة أخرى بعد قليل';
        }

        dd($status_code);
    }

    /**
     * Setting confirmation message
     *
     * @param string $password
     * @param string $ani
     *
     * @return string
     */
    public static function confirmMessage(string $password, string $ani)
    {
        $message = "شكراَ لإشتراكك فى خدمة ArabGamz  يمكنك الوصول الى حسابك و الإستمتاع بالخدمة من خلال زيارة موقعنا  http://www.arabgamz.com" . "أسم المستخدم " . $ani . " كلمة السر " . $password
            . " سوف يتم خصم 2 جنيه يوميا لكى تتمكن من إلغاء الإشتراك الخاص بكم الرجاء تسجيل دخول الحساب الخاص بك علي الرابط http://www.arabgamz.com/unsubscribe  والضغط على إلغاء الإشتراك أو أرسل كلمة STOP ARABGAMZ إلى 4565 لاى استفسار تواصل معنا  علي help@arabgamz.com";

        return $message;
    }
}
