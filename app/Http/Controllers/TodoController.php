<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
/*Auth untuk menyimpan history login
/*prefic ibu kalo mau akses harus panggil ibu nya dulu*/

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = DB::table('todos')->get();
        return view('home', ['todos' => $todos], ['title' => 'Todolist']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    $user = $request->only('username','password');
    if (Auth::attempt($user)){
        return redirect()->route('todo.index');
    }else {
        return redirect()->back()->with('eror', 'Gagal login, silahkan cek');
    }
    }

    public function todo()
    {   $data['title'] = 'Todo';
        return view('todo',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form
        $request->validate([
            'task' => 'required|max:200'
        ]);

        // store the data
        DB::table('todos')->insert([
            'task' => $request->task
        ]);

        // redirect
        return redirect('/')->with('status', 'Task added!');
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
        //
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
        // validate the form
        $request->validate([
            'task' => 'required|max:200'
        ]);

        // update the data
        DB::table('todos')->where('id', $id)->update([
            'task' => $request->task
        ]);

        // redirect
        return redirect('/')->with('status', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete the todo
        DB::table('todos')->where('id', $id)->delete();

        // redirect
        return redirect('/')->with('status', 'Task removed!');
    }
}
