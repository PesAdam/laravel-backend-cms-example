<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Projects;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    function show(){
        try{
            $cards = Projects::all();
            return view('projects.projects', compact('cards'));
        }catch(ModelNotFoundException $exception){
            return back() -> withErrors($exception->getMessage()->withInput());
        }
    }
    
    function create(Request $request) {
        $request->validate([
            'project_image' => 'image|mimes:jpg,png,jpeg,webp|required',
            'project_name' => 'required',
            'project_text' => 'required',
            'project_link' => 'required',
            'project_rating' => 'required',
            'project_category' => 'required',
        ]);

        $input['project_name'] = $request->project_name;
        $input['project_text'] = $request->project_text;
        $input['project_image'] = $request->project_image;
        $input['project_link'] = $request->project_link;
        $input['project_rating'] = $request->project_rating;
        $input['project_category'] = $request->project_category;


        $disk = Storage::build([
            'driver' => 'local',
            //'root' => realpath(dirname(getcwd(), 2) ).'/images',
            'root' => realpath(dirname(getcwd(), 2)).'/images',
        ]);
    
        $uploadedFile = $request->file('project_image');
        if($uploadedFile != null){
            $filename = $input['project_image'] = $uploadedFile->getClientOriginalName();
            $strored_path = $disk->put($filename,$uploadedFile);
            $input['project_image'] = $strored_path;
        }
        Projects::create($input);
        Session::flash('message', 'Vytvorené');
        Session::flash('alert-class', 'alert-success');

        return redirect(route('projects.show'));
    }

    function showOne($id){
        try{
            $card = Projects::find($id);
            return view('projects.project', compact('card'));
        } catch (ModelNotFoundException $exception){
            return back();
        }
    }

    function delete($id){
        $post = Projects::find($id);
        $path = realpath(dirname(getcwd(), 2) ).'/images/'.$post->card_image;
        File::delete($path);
        $post->delete(request()->all);
        
        Session::flash('message', 'Vymazane!');
        Session::flash('alert-class', 'alert-danger');
        return redirect(route('projects.show'));
    }

    function update(Request $request, $id){
        $input['project_name'] = $request->project_name;
        $input['project_text'] = $request->project_text;
        //$input['project_image'] = $request->project_image;
        $input['project_link'] = $request->project_link;
        $input['project_rating'] = $request->project_rating;
        $input['project_category'] = $request->project_category;

        $disk = Storage::build([
            'driver' => 'local',
            //'root' => realpath(dirname(getcwd(), 2) ).'/images',
            'root' => realpath(dirname(getcwd(), 2)).'/images',
        ]);
        $uploadedFile = $request->file('project_image');
        
        if($uploadedFile != null){    
            $filename = $input['project_image'] = $uploadedFile->getClientOriginalName();
            $stored_file_path = $disk->put($filename,$uploadedFile);
            $input['project_image'] = $stored_file_path;
            //dd($stored_file_path);
        }
        Projects::find($id)->update($input);
        Session::flash('message', 'Editované!');
        Session::flash('alert-class', 'alert-info');

        return redirect(route('projects.show'));
        
    }

}
