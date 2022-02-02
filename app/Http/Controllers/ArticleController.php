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
          ->select( "users.email","users.name as user_name" , "articles.*" ,"articles.id as articleId","images.name as pathImage", "categories.name as category_name" ,)->paginate(5);


           return view('pages.articles', ['data' =>$data]);
       }

       public function create(){
               $data = Category::all();

               return view('pages.add_article ' ,['data' =>$data]);
       }


       public function show($id){

               $data = Category::all();
               $articleData= Article::find($id);
               $imageData = Images::select('name',)->where('id', $articleData->img_id)->get();

               //merge article data and image data
               $article = array_merge($articleData->toArray(), $imageData->toArray());
// dd($article);
               return view('pages.add_article ',['data' =>$data], ['articleData' => $article]);
       }

      public function update(Request $request, $id){

                $id = (int) $id;
                 //validate server-side
                $validator = Validator::make($request->all(),[
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'title' => 'required',
                    'body' => 'required',
                    'category_id' => 'required'
                    ]);
                       if($validator->fails()){
                         return back();
                           }
              //validate if current category exists
               $checkCategory = Category::find($request->category_id);
              if(empty($checkCategory)) return back();

              //get current article model
             $article = Article::find($id);

              //if there is no image request it means image didnt change
              if(empty($request->image)){
                $article->update($request->all());
                 return  redirect()->route('article.index');
              }
              //on the another hand we need to store the new image and update it manually
              else
              {

              //store image
              $imageId =$this->createImage($request);

               //save info
               $article->title = $request->title;
               $article->body= $request->body;
               $article->category_id= $request->category_id;
               $article->img_id= $imageId;
               $article->save();

               return redirect()->route('article.index');
              }

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
                    return back();
                 }

              // validate if category exists
              $checkCategory = Category::find($request->category_id);
              if(empty($checkCategory)) return back();
              //store image
                 $imageId =$this->createImage($request);

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

       public function destroy($id){

                   $oSite = DB::table('articles')
                                   ->where('id', $id)
                                      ->delete();

                     return redirect()->route('article.index')->with('deletedSuccessfully', 'Category deleted successfully');
       }

      private function createImage(Request $request){

               $imageName = time().'.'.$request->image->extension();
               $request->image->move(public_path('images'), $imageName);
               $imageCreated  =  Images::create([
                    'name'=> $imageName
                 ]);
               return $imageCreated->id;

       }

}
