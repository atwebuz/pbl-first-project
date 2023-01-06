<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(){
        return view('pages.index');
    }
    public function contactForm(Request $request){

        $form = new Form();
        $form->fullname = $request->fullname;
        $form->email = $request->email;
        $form->subject = $request->subject;
        $form->message = $request->message;
        $form->time = $request->time;

        if($request->newsletter == 'on'){
            $form->newsletter = true;
        }else{
            $form->newsletter = false;
        }

        if ($form->save()){
            return back()->withSuccess('Success');
        }

        return back();

    }
}
