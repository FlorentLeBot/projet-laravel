<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countQuestions = Question::whereUserId(Auth::id())->count();
        return view('home', compact('countQuestions', 'count'));
    }
    public function update(Request $request){

        $validator = Validator::make($request->all(),[
            'password_old' => [
                'required',function($attribute, $value, $fail){
                    //dd($attribute);
                if(!Hash::check($value, Auth::user()->password)){
                    return $fail("L'ancien mot de passe est erroné ! 😂");
                }
            }
        ],
            'password' => 'required|string|min:8|confirmed'
        ]);
        if ($validator->fails()){
            return back()->widthErrors($validator);
        }
        Auth::user()->update(['password'=>Hash::make($request->password)]);
        return back()->withStatus('Le mot de passe a bien été modifié ! ');
    }

    
}
