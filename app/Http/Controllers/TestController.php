<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Questions;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Question\Question;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TestController extends Controller
{
    function show(){
        try{
            $tests = Questions::all();
            return view('tests.questions', compact('tests'));
        }catch(ModelNotFoundException $exception){
            return back();
        }
    }

    function save(Request $request){
        $request->validate([
            'question' => 'required',
            //'correct_answer' => 'required',
            'category' => 'required',
            'answer_one' => 'required',
            'answer_two' => 'required',
            'answer_three' => 'required',
            'answer_four' => 'required',

        ]);
        
        $input['question'] = $request->question;
        $input['answer_one'] = $request->answer_one;
        $input['answer_two'] = $request->answer_two;
        $input['answer_three'] = $request->answer_three;
        $input['answer_four'] = $request->answer_four;
        $input['correct_answer'] = $request->correct_answer;
        $input['category'] = $request->category;
 
        Questions::create($input);
        Session::flash('message', 'Vytvorené!');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('tests.show'));
    }

    function showOne($category){
        try{
            $cards = Questions::where('category', $category)->get();
            return view('tests.question', compact('cards'));
        }catch(ModelNotFoundException $exception){
            return back();
        }
    }
}
