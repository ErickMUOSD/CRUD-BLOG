<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public  function index(){

        $data = Category::latest()->paginate(5);
   return view('pages.categories', ['data' =>$data]);
    }


    public  function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:45|min:6',
        ]);
        if($validator->fails()){
        return redirect()->route('category.index')
         ->withErrors($validator)
         ->withInput();
             }
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('category.index')->with('addedSuccessfully', 'Category added successfully');
    }

   public function update(Request $request, Category $category){
     $validator = Validator::make($request->all(),[
                 'name' => 'required|string|max:45|min:6',
             ]);

             if($validator->fails()){
                  return redirect()->route('category.index')
                      ->withErrors($validator)
                      ->withInput();
                 }
   $category->update($request->all());


     return redirect()->route('category.index')->with('addedSuccessfully', 'Category updated successfully');

   }

    public function destroy(Category  $category){

        $category->delete();

        return redirect()->route('category.index')->with('deletedSuccessfully', 'Category deleted successfully');
    }
}
