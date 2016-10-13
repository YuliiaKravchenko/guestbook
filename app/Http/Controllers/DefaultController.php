<?php

namespace App\Http\Controllers;

use Validator;

use App\Models\Messages;

use Illuminate\Http\Request;

use App\Http\Requests;

class DefaultController extends Controller
{
    public function index(Request $request){
        $success='';
        if ($request->isMethod('post')) {
           // dd($request->all());
            $request->flash();//возвращение введенного значения после отправки формы, для этого в инпут нужно указать метод old
            $data = $request->all();
            $validator = Validator::make($data, [
            'username' => 'required|max:100',
            'email' => 'required|max:150|email',
            'msg' => 'required|max:3000',
            'img' => 'mimes:jpeg,bmp,phg',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
            if ($validator->fails()) {
            return view('default.index',[
                'errors' => $validator->errors()->all()
            ]);
        }
            //создаем объект класса модели и т.к. поле с именем не совпадаем добавлем данные по столбцам
            $messages = new Messages();
            $messages->name = $data['username'];
            $messages->email = $data['email'];
            $messages->msg = $data['msg'];
            $messages->url = $data['url'];
            
            if ($request->hasFile('img')) {
                $request->file('img')->move('upload', $request->file('img')->getClientOriginalName());
                $messages->img = $request->file('img')->getClientOriginalName();
            }
            
            $messages->save();//только после этой строки данные записываются в БД, это пример active record
            
            $success = 'Form is sent successfuly';
        }
        
        $allMessages = Messages::orderBy('created_at','desc')->paginate(3);
                
        return view('default.index', [
                    'success' => $success,
                     'messages' => $allMessages
                    ]);
    }
}
