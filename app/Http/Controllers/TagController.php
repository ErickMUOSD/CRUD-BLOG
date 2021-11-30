<?php

namespace App\Http\Controllers;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TagController extends Controller
{
   public  function index(){

           $data = Tags::latest()->paginate(5);
      return view('pages.tags', ['data' =>$data]);
       }


       public  function store(Request $request){

           $validator = Validator::make($request->all(),[
               'name' => 'required|string|max:45|min:6',
           ]);
           if($validator->fails()){
           return redirect()->route('tag.index')
            ->withErrors($validator)
            ->withInput();
                }
           Tags::create([
               'name' => $request->name
           ]);
           return redirect()->route('tag.index')->with('addedSuccessfully', 'Tag added successfully');
       }

      public function update(Request $request, Tags $tag){
        $validator = Validator::make($request->all(),[
                    'name' => 'required|string|max:45|min:6',
                ]);

                if($validator->fails()){
                     return redirect()->route('tag.index')
                         ->withErrors($validator)
                         ->withInput();
                    }


       $tag->name = $request->name;
       $tag->save();

        return redirect()->route('tag.index')->with('addedSuccessfully', 'Tag added successfully');

      }

       public function destroy(Tags  $tag){

           $tag->delete();

           return redirect()->route('tag.index')->with('deletedSuccessfully', 'Tag deleted successfully');
       }
}
