<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use Redirect;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function authcheck(){
        $auth = [0,1];
        return $auth[Auth::check()];
    }
    public function allusers(){
        return User::get();
    }
    public function showusers(){
        $data['users'] = User::get();
      
        return view('user.list',$data);
    }
    public function text(Request $request){
        return  $request->get('id') ;
    }

    public function showuser($id){
        $data = User::find($id);
        return view('user.show',$data);
    }

   
    public function edituser()
    {   
        $data = Auth::user();
        return view('user.edit', $data);
    }

    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable' , 'image' , "max:1999"],
            'city' => ['nullable' , 'string' , 'max:255'],
            'birthday' => ['nullable' , 'string'],
            'bio' => ['nullable' , 'string'],
            'gender' => ['nullable' , 'string' , 'max:255'],
        ]);
         
          
            $fileNameToStore = "noimage.jpg";
        if($request->hasFile('image')){

          
            $filenamewithext = $request->file('image')->getClientOriginalName();

            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);

        };


        $update = ['name' => $request->name,'image'=>$fileNameToStore,'city'=>$request->city,'birthday'=>$request->birthday,'bio'=>$request->bio,'gender'=>$request->gender];
        User::where('id',$id)->update($update);
   
        return Redirect::to('home')
       ->with('success','Great! user updated successfully');
    }
    public function landing(){
        $data['recipes'] =Recipe::orderBy('created_at','desc')->take(3)->get();
        return view('welcome',$data);
    }
}
