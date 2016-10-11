<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

class DefaultController extends Controller
{
    public function index(Request $request){
        $success='';
        if ($request->isMethod('post')) {
           // dd($request->all());
            $request->flash();//возвращение введенного значения после отправки формыы
            $validator = Validator::make($request->all(), [
            'username' => 'required|max:100',
            'email' => 'required|max:150|email',
            'msg' => 'required|max:3000',
            'img' => 'mimes:jpeg,bmp,phg'
        ]);
            if ($validator->fails()) {
            return view('default.index',[
                'errors' => $validator->errors()->all()
            ]);
        }
            if ($request->hasFile('img')) {
                $request->file('img')->move('upload', $request->file('img')->getClientOriginalName());
            }
            $success = 'Form sent successfuly';
        }
        return view('default.index',['success' => $success]);
    }
}
