<?php

namespace App;



class Response extends Subscription
{
    /*
     * Status code for response
     *
     * @var string
     * */
    protected $statusCode;
    /*
     * Description of response status code
     *
     * @var string
     * */
    protected $text;

    /*
     * Check if request succeeded or failed
     *
     * @param void
     * @return bool
     * */
    public function success()
    {
        return $this->statusCode == self::SUCCESS ? true : false;
    }
}
