<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;
// use Illuminate\Routing\Controller as BaseController;
use \App\Models\Cards;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use DOMDocument;
class CardController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        try{
            $cards = Cards::all();
            return view('cards.cards', compact('cards'));
        }catch(ModelNotFoundException $exception){
            return back();
        }
    }

    function create(Request $request){

        $request->validate([
            'card_image' => 'image|mimes:png,jpg,jpeg,webp|required',
            'card_name' => 'required',
            'card_text'=> 'required'
        ]);

        $input['card_name'] = $request->card_name;
        $input['card_text'] = $request->card_text;
        $input['card_image'] = $request->card_image;
        $input['card_color'] = $request->card_color;
        $input['card_background_color'] = $request->card_background_color;
        
        $disk = Storage::build([
            'driver' => 'local',
            'root' => realpath(dirname(getcwd(), 2)).'/images',
        ]);

        $uploadedFile = $request->file('card_image');
        if($uploadedFile != null){
            $filename = $input['card_image'] = $uploadedFile->getClientOriginalName();
            $strored_path = $disk->put($filename,$uploadedFile);
            $input['card_image'] = $strored_path;
        }
        
        //dd($input);
        Cards::create($input);
        Session::flash('message', 'Vytvorené!');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('cards.show'));
    }
    
    function update(Request $request, $id){
           
        $input['card_name'] = $request->card_name;
        $input['card_text'] = $request->card_text;
        //$input['card_image'] = $request->card_image;
        $input['card_color'] = $request->card_color;
        $input['card_background_color'] = $request->card_background_color;

        $disk = Storage::build([
            'driver' => 'local',
            'root' => realpath(dirname(getcwd(), 2)).'/images',
        ]);
        
        $uploadedFile = $request->file('card_image');
        
        if($uploadedFile != null){    
            $filename = $input['card_image'] = $uploadedFile->getClientOriginalName();
            $strored_path = $disk->put($filename,$uploadedFile);
            $input['card_image'] = $strored_path;
            //dd($strored_path);
        }
        
        Cards::find($id)->update($input);
        Session::flash('alert-class', 'alert-info');
        Session::flash('message', 'Editované!');
        return redirect(route('cards.show'));
    }


    function showOne($id){
        try{
            $card = Cards::find($id);
            return view('cards.card', compact('card'));
        }catch(ModelNotFoundException $exception){
            return back();
        }
    }


    function delete($id){
        $post = Cards::find($id);
        $path = realpath(dirname(getcwd(), 2) ).'/images/'.$post->card_image;
        
        File::delete($path);
        $post->delete(request()->all);

        Session::flash('message', 'Vymazané!');
        Session::flash('alert-class', 'alert-danger');
        return redirect(route('cards.show'));
    }

}
