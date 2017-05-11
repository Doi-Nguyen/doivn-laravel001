<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Page;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function infoUser(){
        return view('frontend.infoUser');
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
        return redirect('/frontend/home');
    }
}
