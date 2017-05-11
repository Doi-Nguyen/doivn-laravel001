<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home');
    }

    /**
     *
     */
    public function infoUser(){
        return view('infoUser');
    }

    /**
     *
     */
    public function updateUser(Request $request){

        $role = [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'birthday' => 'required|date',
            'slogan' => 'required',
        ];

        $message = [
            'name.required' => 'user name khong duoc de trong',
            'name.max' => 'toi da 255 ki tu',
            'address.required' => 'dia chi khong duoc de trong',
            'address.max' => 'toi da 255 ki tu',
            'birthday.required' => 'ngay sinh khong duoc de trong',
            'birthday.date' => 'phai la ngay thang nam',
            'slogan.required' => 'phuong tram song khong duoc de trong',
        ];

        $this->validate($request, $role, $message);

        // update user infomation
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'slogan' => $request->slogan
            ]);

        $request->session()->flash('flash', 'you have already editted Infomation');
        return redirect('/home');
    }
}
