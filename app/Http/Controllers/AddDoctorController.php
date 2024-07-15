<?php

namespace App\Http\Controllers;

use App\Models\AddDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddDoctorController extends Controller
{
    // addDoctorPage
    public function addDoctorPage() {
        return view('admin.addDoctor');
    }

    // getAddDoctorPage
    public function getAddDoctorPage(Request $request){
        $this->photoValida($request);
        $data = $this->data($request);
        AddDoctor::create($data);
        return back()->with(["data" => "Create Success"]);

    }


    // photoValida
    private function photoValida($request) {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'speciality' => 'required',
            'room_number' => 'required',
            'image' => 'mimes:jpg,bmp,png'
        ])->validate();
    }

    // data
    private function data($request) {
        if ($request->hasFile('image')) {
            $filename = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $filename);
        };


        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'speciality' => $request->speciality,
            'room_number' => $request->room_number,
            'image' => $filename,
        ];

        return $data;
    }
}
