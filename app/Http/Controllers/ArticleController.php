<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
        public  function index(){




          $data = User::join('articles', 'articles.user_id', '=', 'users.id')
          ->join('categories', 'categories.id', '=', 'articles.category_id')
          ->select( "users.email","users.name as user_name" , "articles.*", "categories.name as category_name" ,)->paginate(5);


           return view('pages.articles', ['data' =>$data]);
       }

       public function addArticle(){
               $data = Category::all();

               return view('pages.add_article ' ,['data' =>$data]);
              }

}
