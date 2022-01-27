<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Images;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
        public  function index(){

          $data = User::join('articles', 'articles.user_id', '=', 'users.id')
          ->join('categories', 'categories.id', '=', 'articles.category_id')
          ->join('images', 'images.id', '=', 'articles.img_id')
          ->select( "users.email","users.name as user_name" , "articles.*","images.name as pathImage", "categories.name as category_name" ,)->paginate(5);


           return view('pages.articles', ['data' =>$data]);
       }

       public function addArticle(){
               $data = Category::all();

               return view('pages.add_article ' ,['data' =>$data]);
       }

       public function imagePost(Request $request)
       {

             //validation server side
                $validator = Validator::make($request->all(),[
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'required'
                ]);
                if($validator->fails()){
                    return redirect()->route('add.article')
                         ->withErrors($validator)
                         ->withInput();
                 }

              // validate if category exists
              $checkCategory = Category::find($request->category_id);
              if(empty($checkCategory)) return back();


              //store image
               $imageName = time().'.'.$request->image->extension();
               $request->image->move(public_path('images'), $imageName);
               $imageCreated  =  Images::create([
                    'name'=> $imageName
                 ]);
               $imageId = $imageCreated->id;

               //get current user in the session
              $user = Auth::id();

               Article::create([
                    'title' => $request->title,
                    'body' => $request->body,
                    'category_id' => $request->category_id,
                    'img_id'=> $imageId,
                    'user_id' =>$user,
               ]);
               return  redirect()->route('article.index');
       }

}
