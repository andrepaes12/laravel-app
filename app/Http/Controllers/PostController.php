<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
        $post = Post::find($id);

        // registro manual de comentário do post
        // $post->comments()->create([
        //     'content' => 'Teste de comentário'
        // ]);

        // retornar uma VIEW com os dados do Post
        if ($post){
            //
            $author = $post->author()->get()->first();
            // belongsToMany
            $postCategories = $post->categories()->get();
            // add relacionamento na tabela Pivot (post_categories)
            // $post->categories()->attach(3);
            // $post->categories()->attach([3, 7]);
            // remove o relacionamento na tabela Pivot
            // $post->categories()->detach([1, 2, 3, 7]);
            // atualizar o relacionamento mantendo apenas o informado, incluindo/excluindo outros
            // $post->categories()->sync([2, 4, 7]);
            // atualizar o relacionamento incluindo os faltantes sem excluir outros
            // $post->categories()->syncWithoutDetaching([3]);

            $comments = $post->comments()->get();

            // setTitleAttibute()
            // redefinir o valor dos campos title e slug da table posts (rota: //posts/id)
            // $post->title = 'Título de teste do artigo!';
            // $post->save();


            return view('showpost', ['post' => $post, 'author' => $author, 'postCategories' => $postCategories, 'comments' => $comments]);
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
