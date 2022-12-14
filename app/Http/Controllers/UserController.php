<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Route->users->UserController
        $user = User::find($id);
        // comentar p/ poliformismo
        // $comments = $user->commentsOnMyPost()->get();
        // poliformismo
        $comments = $user->comments()->get();

        // criar registro manual do comentário p/ Usuário
        // $user->comments()->create([
        //     'content' => 'Teste de comentário do Modelo Usuário'
        // ]);

        // escopo Students by Model
        $students = User::students()->get();
        $admins = User::admins()->get();

        // retornar uma VIEW com os dados do User
        if ($user){
            return view('show', ['user' => $user, 'comments' => $comments, 'students' => $students, 'admins' => $admins]);
        } else {
            return view('notfound');
        }


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
