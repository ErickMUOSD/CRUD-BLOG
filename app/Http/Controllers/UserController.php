<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
        public function index(){
            $data = User::latest()->paginate(5);
             return view('pages.user' ,['data' =>$data]);
        }

            public  function store(Request $request){

                    $validator = Validator::make($request->all(),[
                    'name' => 'required|string|max:45|min:6',
                     'email' => 'required|string|max:45|min:6',
                      'password' => 'required|string|max:45|min:6',
                       'rol'=> 'in:Administrador,Cliente' ,
                    ]);

                    if($validator->fails())

                        return redirect()->route('user.index') ->withErrors($validator)->withInput();


                            User::create([
                                'name' => $request->name,
                                'email' => $request->email,
                                'password' =>  Hash::make($request->password),
                                'rol' => $request->rol
                             ]);


                return redirect()->route('user.index')->with('addedSuccessfully', 'User added successfully');
            }

             public function update(Request $request, User $user){

                $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:45|min:6',
                 'email' => 'required|string|max:45|min:6',
                   'rol'=> 'in:Administrador,Cliente' ,
                ]);

                     if($validator->fails()){
                          return redirect()->route('user.index')
                              ->withErrors($validator)
                              ->withInput();
                         }

                 if(!empty($request->password)){
                   $user->password = Hash::make($request->password);
                 }
                $user->name = $request->name;
                $user->email = $request->email;
                $user->rol = $request->rol;
                $user->save();

                return redirect()->route('user.index')->with('addedSuccessfully', 'User updated successfully');

             }

            public function destroy(User  $user){

                $user->delete();

                return redirect()->route('user.index')->with('deletedSuccessfully', 'User deleted successfully');
            }
}
