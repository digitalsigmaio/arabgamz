<?php

namespace App\Http\Controllers;

use App\GetStatus;
use App\SendSMS;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->ani = $request->ani;
        $user->operator_id = $request->operator_id;
        $password = str_random(6);
        $user->password = bcrypt($password);

        $user->save();
        Auth::login($user);

        return redirect()->route('home');
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request) {
        $this->validate($request, [
            'number' => 'required',
            'password' => 'required'
        ]);

        $ani = $request->number;
        $getStatus = new GetStatus($ani);
        $getStatusResponse = $getStatus->getStatusRequest();

        if(is_a($getStatusResponse, 'App\GetStatusResponse')){
            if ($getStatusResponse->isActive()){
                if(Auth::attempt([
                    'ani' => $request->number,
                    'password' => $request->password
                ])){
                    return redirect()->route('home');
                } else {
                    return redirect()->back()->withErrors(['تأكد من صحة رقمك و كلمة السر']);
                }
            } else {
                $user = User::where('ani', $ani)->first();
                if($user != null){
                    $user->delete();
                }
                return redirect()->back()->withErrors(['هذا الرقم غير مشترك بالخدمة']);
            }
        } else {
            Log::useDailyfiles(storage_path() . '/logs/getStatusErrors.log');
            Log::info([
                'error' => $getStatusResponse,
            ]);
            return redirect()->back()->withErrors(['هناك مشكلة فى النظام حاول مرة أخرى بعد قليل']);
        }


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function passwordForm(){
        return view('forgotPassword');
    }

    public function passwordRequest(Request $request){
        $this->validate($request, [
            'ani' => 'required',
        ]);
        $ani = $request->ani;
        $user = User::where('ani', $ani)->first();

        if($user != null){
            $password = str_random(6);
            $user->password = bcrypt($password);
            $user->save();
            $message = "* أسم المستخدم " . $ani;
            $message .= " * كلمة السر " . $password;

            $sms = new SendSMS($ani, $message);
            $smsResponse = $sms->sendSmsRequest();
            if(is_a($smsResponse, 'App\SendSMSResponse')){
                return redirect()->route('login');
            } else {
                return redirect()->back()->withErrors([$smsResponse]);
            }
        } else {
            return redirect()->back()->withErrors(['هذا الرقم غير مشترك بالخدمة']);
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
