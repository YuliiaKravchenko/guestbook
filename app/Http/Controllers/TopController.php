<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Factories\TopFactory;

class TopController extends Controller
{
    public function index($top, $period='week'){
        
    $factory = new TopFactory();//создаем объект класса
    
    $obj = $factory->factoryMethod($top);// выберит авторов или книги согласно фабричного метода
    
    $result = $obj->top($period);// в авторах/книгах выбираем нужный период
        
        return view('top.index',[
            'top' => $top,
            'period' => $period,
            'result' => $result
            ]);       
    }
}