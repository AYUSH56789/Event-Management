<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;

class Admin extends Controller
{
    // index to render home view
    
    public function index(){
        $count=Society::count();
        $data=compact('count');
        // die;
        return view('admin.home')->with($data);
    }


    // society to render home view
    public function society(){
        $socities=Society::all();
        
        $data=compact('socities');
        return view('admin.society')->with($data);
    }

    // registration to render home view
    public function registration(){
        return view('admin.registration');
    }

    public function store(Request $req){
        
        // echo 'we reach';
        // print_r($req->all());
        $req->validate(
            [
                "society_name"=>"required ",
                "society_head"=>"required",
                "society_conviner"=>"required",
                "society_contact"=>"required ",
                "society_email"=>"required | email ",
                // "society_logo"=>"required", //pending
                // "society_banner"=>"required", //pending
                "society_description"=>"required"
            ]
            );
    
        $soc=new Society;
        $soc->society_name=$req['society_name'];
        $soc->society_head=$req['society_head'];
        $soc->society_conviner=$req['society_conviner'];
        $soc->society_contact=$req['society_contact'];
        $soc->society_email=$req['society_email'];
        $soc->society_logo=$req['society_logo'];
        $soc->society_banner=$req['society_banner'];
        $soc->society_description=$req['society_description'];
        $soc->save();
        // session
        session()->flash('success', 'Society created successfull');
        // echo 'data add successfully into database ';
        return redirect('/admin/society');
    }
    

    // delete societies
    public function delete($id)
{
    $society = Society::find($id);
    if (!is_null($society)) {
        $society->delete();

        // Redirect back to the society page with a success message
        return redirect()->route('admin.society')->with('success', 'Society deleted successfully.');
    } else {
        // Redirect back to the society page with an error message
        return redirect()->route('admin.society')->with('error', 'Society not found.');
    }
}
}
