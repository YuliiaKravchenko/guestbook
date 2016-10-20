<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Validator;
use App\Models\Authors;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class AuthorsController extends Controller
{
    public function index(){
        $authors = Authors::all();
        return response()->json($authors);
    }
    
    public function insert(Request $request){
        $params = $request->all();
        
        $validator = Validator::make($params, [
            'name' => 'required|max:100|unique:authors',
        ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'messege' => 'author name adding failed'
                ]); 
            }
        else {
                    Authors::create($params);
                    $authors = Authors::all();
                    return response()->json([
                        'status' => 'ok',
                        'messege' => 'success',
                        'result' => $authors
                    ]);
            /*второй вариант добавления данных в таблицу авторов
        $author = new Authors();
        $author -> name = $params['authorName'];
        $author -> save();
        */
                }
        }
}

