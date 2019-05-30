<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;

class UsersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        //$this->middleware('user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
            'role' => 'required|in:admin,user',
        ]);

        // if($validator->fails()){
        //     return response()->json(['errors' => $validator->errors()->all()]);
        // }
        $request->merge(['password' => Hash::make($request->password)]);

        $user = User::create($request->all());
        //$$request->merge(['password' => Hash::make($request->password)]);

        return redirect('/users')->with('success', 'User Added Successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(auth()->user()->id == $user->id || auth()->user()->role == 'user'){
            return redirect('/dashboard')->with('error', 'Unauthraization Page Access');
        }

        return view('users.edit')->with('user', $user);
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
        if($request->has('password') && !$request->filled('password')){
            $request->request->remove('password');
        }else{
            $request->merge(['password' => Hash::make($request->password)]);
        }
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['string', 'min:8',],
            'role' => 'required|in:admin,user',
        ]);

        

        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect('/users')->with('success', 'User Updated Successfully'); 
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // if(auth()->user()->id == $user->id || auth()->user()->role == 'user'){
        //     return redirect('/dashboard')->with('error', 'Unauthraization Page Access');
        // }
    }

    public function saveUser(Request $request){
        // $data =  $request->all();

        // return response()->json($data);
    }
}
