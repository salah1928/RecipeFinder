<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use App\Step;
use Redirect;
use PDF;
use Auth;
use Illuminate\Support\Facades\Storage;
class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function search(Request $request, $search) {
        if ($search) {
          
             // If the search is empty, return everything
            if (empty(trim($search))) {
             return Recipe::orderBy('created_at','desc')->paginate(12);
             }
      // If the search contains something, we perform the fuzzy search 
            else {
            //  $fuzzySearch = implode("%", str_split($search)); // e.g. test -> t%e%s%t
             $fuzzySearch = implode("%", str_split(str_replace(" ", "", $search)));
             $fuzzySearch = "%$fuzzySearch%"; // test -> %t%e%s%t%s%
  
            return Recipe::where("title", "like", $fuzzySearch)->orderBy('created_at','desc')->paginate(12);
            }

        } else {
          return "lol";
        }
      }

    public function index()
    {
     
        $data['recipes'] = Recipe::orderBy('created_at','desc');
        return view('recipe.list',$data);
    }
    public function all(){
        $data['recipes'] = Recipe::orderBy('created_at','desc')->paginate(12);
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $storename = "noimage.jpg";
        if($request->image){
            $img64 = explode(',',$request->image);

            $img = base64_decode($img64[1]);

            $storename = time().'_'.$request->imgname;

            $path = public_path().'\recipe_images\\'.$storename;

            file_put_contents($path , $img);

        }

        
        $request-> validate([
            'title' => 'required',
            
            'description' => 'required',
        ]);
        
            $ings = json_encode(explode(' ',$request->get('ingredients')));
          
        // $fileNameToStore = "noimage.jpg";
        // if($request->hasFile('image')){

          
        //     $filenamewithext = $request->file('image')->getClientOriginalName();

        //     $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);

        //     $extension = $request->file('image')->getClientOriginalExtension();

        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;

        //     $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);

        // };


        $recipe = Recipe::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'ingredients' => $ings,
            'image'=>$storename,
            'user_id'=> Auth::user()->id
        ]);
            $steps = $request->get('steps');
        foreach($request->steps as $step){

                $store = "noimage.jpg";
            if($step['image']){
                $imgs64 = explode(',',$step['image']);
                $imgs = base64_decode($imgs64[1]);
                $store = time().'_'.$step['imagename'];
                $path = public_path().'\step_images\\'.$store;
            file_put_contents($path , $imgs);
            }


             Step::create([
            'name' => $step['name'],
            'description' => $step['desc'],
            'recipe_id' => $recipe->id,
            'image'=>$store
        ]);
        }
     
        return $recipe->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $where = array('id' => $id);
        $data['recipe_info'] = Recipe::where($where)->first();
        $data['recipe_info']->ingredients =str_replace(['","','"]','["'],' ', $data['recipe_info']->ingredients);
        $data['allow'] = 0;
        $recipe = Recipe::find($id);
        if(Auth::check()){
            if(Auth::user()->id ==$recipe->user->id){
                $data['allow'] = 1;
            }
        }
        $data['user'] = $recipe->user;
        $data['steps'] = $recipe->steps;
        $data['comments'] = $recipe->comments()->orderBy('created_at')->get();
      
    $data['comments'] =$recipe->comments;
  
    foreach($data['comments'] as $comment){
        $comment->user = $comment->user()->first()->name;
       
    };
    $data['comments'] = $data['comments']->toArray();
    // $recipe = Recipe::findOrFail($id)->with(['user', 'steps', 'comments' => function($q){ $q->orderBy('created_at'); } ])->first();
    // $data['comments'] = $recipe->comments->toArray();
    // $data['steps'] = $recipe->steps;
    // $data['user']=$recipe->user;
   
        return view('recipe.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
       if( Recipe::find($id)->user == Auth::user()){
        $where = array('id' => $id);
        $data['recipe_info'] = Recipe::where($where)->first();
      
        $data['recipe_info']->ingredients =str_replace(['","','"]','["'],' ', $data['recipe_info']->ingredients);
    
        $data['steps'] = Step::where('recipe_id',$data['recipe_info']->id)->get();
        return view('recipe.edit', $data);
       }else{
        return Redirect::to('recipes');
       }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $storename = "noimage.jpg";
        if($request->image){
            $img64 = explode(',',$request->image);

            $img = base64_decode($img64[1]);

            $storename = time().'_'.$request->imgname;

            $path = public_path().'\recipe_images\\'.$storename;

            file_put_contents($path , $img);

        }

        
        $request-> validate([
            'title' => 'required',
            
            'description' => 'required',
        ]);
        
            $ings = json_encode(explode(' ',$request->get('ingredients')));


        $update = 
        ['title' => $request->title,
        'description' => $request->description,
        'image' =>$storename,
        'ingredients' =>$ings];
        Recipe::where('id',$id)->update($update);
        




        $steps = $request['steps'];
      
       
        
        foreach($steps as $step){
            $store = $step['image'];
            if(isset($step['newimage'])){

                $imgs64 = explode(',',$step['newimage']);
                $imgs = base64_decode($imgs64[1]);
                $store = time().'_'.$step['imagename'];
                $path = public_path().'\step_images\\'.$store;
                file_put_contents($path , $imgs);

            }
           


          Step::where('id',$step['id'])->update(
              [
                'name' => $step['name'],
                'image'=>$store,
                'description' => $step['description'],
               
              ]
              );


            
        
        }






        return Redirect::to('recipes')
       ->with('success','Great! Recipe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipe::where('id',$id)->delete();
   
        return Redirect::to('recipes')->with('success','Recipe deleted successfully');
    }
}
