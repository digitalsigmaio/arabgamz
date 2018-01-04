<?php

namespace App\Http\Controllers;

use App\Unsubscribe;
use App\UnsubscribeResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnsubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function unsubscribe()
    {
        $user = Auth::user();
        $operators = [
            '1' => 'اورانج',
            '2' => 'فودافون',
            '3' => 'إتصالات'
        ];
        $operator = $operators[$user->operator_id];

        return view('unsubscribe', compact(['user', 'operator']));
    }

    public function deleteUser()
    {
        $user = Auth::user();

        $unsubscribe = new Unsubscribe($user->ani);
        $unsubscribeResponse = $unsubscribe->unsubscribeRequest();
        if (is_a($unsubscribeResponse, 'App\UnsubscribeResponse')){
            $user->delete();
            return view('confirmation');
        } else {
            return redirect()->back()->withErrors([$unsubscribeResponse]);
        }
    }
}
