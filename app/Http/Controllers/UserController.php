<?php

namespace App\Http\Controllers;

use App\GetStatus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                return redirect()->back()->withErrors(['هذا الرقم غير مشترك بالخدمة']);
            }
        } else {
            return redirect()->back()->withErrors(['هناك مشكلة فى النظام حاول مرة أخرى بعد قليل']);
        }


    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
