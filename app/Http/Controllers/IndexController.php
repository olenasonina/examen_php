<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getIndex() {
            if(view()->exists('index')) {
                return view('index', ['title' => 'GrainBoard | Главная']);
            }
            abort(404);
    }

    public function createAdv(Request $request) {
        if($request->isMethod('post')) {
            $request->flash();

            // return redirect()->route('createAdv'); 
            // echo "ok";
        }

        if(view()->exists('form')) {
            return view('form', ['title' => 'GrainBoard | Создать']);
        }
        abort(404);
}
}
