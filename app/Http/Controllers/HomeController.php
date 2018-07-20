<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\data;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user('id');
        $logged = $id->id;
        $data = data::where('user_id','=',$logged)->get();
        return view('home')->with('user',$id)->with('dato',$data);
    }

    public function store(Request $req){
        if($req->hasFile('zip')){
            $files = $req->file('zip');
            $id = Auth::user('id');

            $idOnly = $id->id;
            // return $req->zip->store('public.file');
            $filename = Storage::putFile('public.file',$files);
            $mymodel = new data;
            $mymodel->directory_path = $filename;
            $mymodel->user_id = $idOnly;
            $mymodel->save();

            return redirect('/home')->with("success","Upload Success");

            
        }
        else{
           return redirect('/home')->with("error","No File Selected");

        }

    }

    public function edit($ida){
            $id = Auth::user();
            $logged = $id->id;
            $data = data::find($ida);
            return view('update')->with('data',$data);

    }

    public function update(Request $request,$id){
            if($request->hasFile('zip')){
            $files = $request->file('zip');
            $filename = Storage::putFile('public.file',$files);
            $mymodel = data::find($id);
            $mymodel->directory_path = $filename;
            $mymodel->save();
             return redirect()->action('HomeController@edit',$id)->with("success","Upload Updated");
        }
        else{
           return redirect()->action('HomeController@edit',$id)->with("error","No File Selected");
            }
        
    }

    
}
