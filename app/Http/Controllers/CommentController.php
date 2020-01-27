<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Recipe;
use Auth;
class CommentController extends Controller
{

    public function index($id){
        $data['comments'] = Recipe::find($id)->comments()->orderBy('created_at')->get();
       foreach($data['comments'] as $comment){
           $comment->user = $comment->user()->first()->name;
       };
    $data['comments'] =$data['comments']->toArray();
        
        return   $data;
    }
    public function store(Request $request){
      
        Comment::create([
            'content'=>$request->content,
            'user_id'=>Auth::user()->id,
            'recipe_id'=>$request->recipeid
            ]);
    }
    public function update(Request $request,$id){
        Comment::where('id',$id)->update([
            'content'=>$request->content, 
        ]);
    }
}
