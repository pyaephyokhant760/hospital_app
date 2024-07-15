<?php

namespace App\Http\Controllers;

use App\Models\AddDoctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //auth
    public function auth() {
        if (Auth::user()->role == 'user') {
           return redirect()->route('porfilePage');
        }else {
            return redirect()->route('adminHomePage');
        }
    }

    //homePage
    public function homePage() {
        $dataes = AddDoctor::get();
        return view('user.layout',compact('dataes'));
    }


    // appointmentPage
    public function appointmentPage(Request $request) {
        $data = $this->Data($request);
        Appointment::create($data);
        return back()->with(["data" => "Create Success"]);
    }

    // showAppointmentPage
    public function showAppointmentPage() {
        $id = Auth::user()->id;
        $showData = Appointment::where('id',$id)->get();
        return view('user.profile.showAppointment',compact('showData'));
    }





    // validate
    private function validate($request) {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'doctor' => 'required',
            'date' => 'required',
            'message' => 'required',
            'status' => 'required',
            'user_id' => 'required',
        ])->validate();
    }

    // Data
    private function Data($request) {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'doctor' => $request->doctor,
            'date' => $request->date,
            'message' => $request->message,
            'status' => $request->status,
            'user_id' => Auth::user()->id
        ];
    }
}
