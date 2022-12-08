<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use Auth;
use DB;

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
        return view('home');
    }

    // deposite view
    public function deposite()
    {
        return view('deposite');
    }

    public function resend()
    {
        // return view('deposite');
    }

    public function store(Request $request){
        $password = $request->password;
        echo hash::make('$password');
    }

    public function chenge_password(){

        return view('change_password');

    }


    public function update_password(Request $request){

        $request->validate([
            'current_password'      => 'required',
            'password'              => 'required|min:8|max:16|string|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if(Hash::check($request->current_password,$user->password)){

            // $user->password = Hash::make($request->password); //hasing password from input field
            // $user->save();

            $data = array(
                'password' => Hash::make($request->password),
            );

            DB::table('users')->where('id',Auth::id())->update($data);
            Auth::logout();
            return redirect()->route('login');

            return redirect()->back()->with('success','Password Change Successfully!');

        }else{

            return redirect()->back()->with('error','Current Password Not Matched!');

        }

    }
}
