<?php

namespace App\Http\Controllers;

use App\RequestPin;
use Illuminate\Http\Request;
use App\Subscription;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subscribe');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendRequest(Request $request)
    {
        $mobile = $request->ani;
        switch ($request->operator){
            case 1:
                $operator_key = Subscription::ORANGE_KEY;
                $operator_id  = Subscription::ORANGE;
                break;
            case 2:
                $operator_key = Subscription::VODAFONE_KEY;
                $operator_id  = Subscription::VODAFONE;
                break;
            case 3:
                $operator_key = Subscription::ETISALAT_KEY;
                $operator_id  = Subscription::ETISALAT;
                break;
            default:
                $operator_key = null;
                $operator_id  = null;
        }
        if(strlen($mobile) == 11){
            $ani = Subscription::EGYPT_KEY . $mobile;

            $requestPin = new RequestPin($ani, $operator_id);
            $requestResponse = $requestPin->sendRequestPin();
            if($requestResponse->success()){
                return $requestResponse;
                //$requestId = $requestResponse->requestId;
                //return redirect()->route('subscribeConfirm', compact($requestId));
            } else {
                return $requestResponse;
            }

        } elseif (strlen($mobile) == 8){
            if ($operator_key != null) {
                $ani = Subscription::EGYPT_KEY . $operator_key . $mobile;

                $requestPin = new RequestPin($ani, $operator_id);
                $requestResponse = $requestPin->sendRequestPin();
                if($requestResponse->success()){
                    $requestId = $requestResponse->requestId;
                    return redirect()->route('subscribeConfirm', compact($requestId));
                }
            }
        } else {
            return redirect()->back()->withErrors([ 'من فضلك تحقق من الرقم الذي أدخلته']);
        }
        return redirect()->back()->withErrors(['خطأ فى إرسال طلبك']);
    }

    public function subscribeConfirm()
    {
        return view('subscribeConfirmation');
    }

    /*
     * Greetings page
     * */
    public function greetings()
    {
        return view('greetings');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /*
     *  Unsubsribe Form
     * */
    public function unsubscribe()
    {
        return view('unsubscribe');
    }

    /*
     *
     * Confirm Unsubscription*/
    public function deleteConfirm()
    {
        return view('confirmation');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function encrypt()
    {
        $subscription = new Subscription;
        $encryption = $subscription->encrypt(['manson']);
        return response()->json(['data' => $encryption]);
    }
}
