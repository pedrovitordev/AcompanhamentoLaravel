<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
        $posts = Post::paginate(2);
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create'); //chamando a view da pasta post


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* if($request->has('tittle')){

                echo 'Tem titulo: '.$request->title; //pegando oque o usuario escreveu no form

            } */

        /*   dd($request->only(['title', 'slug'])); //retornando dois
 */

        /* dd($request->except(['title', 'slug'])); //retornando todos exceto slug e title

 */
            /* return response('Resposta ok', 200); //retornando resposta */
            
            /* return response('Resposta ok', 200)->cookie('autorizado', 'ok', 6); */

            
            /* return redirect('/'); //redirecionando a pagina */

           /*  return redirect()->route('post.create'); //redirecionando para a mesma pagina e com os campos vazios */


            $post = $request->all();
            $post['is_active'] = true;
            $user = User::find($request->autor);
            $user->posts()->create($post);    

            return redirect()->route('post.index');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // chamar view para editar e mandar para o update

        $post = Post::FindorFail($id);
        return view('posts.edit', ['post' => $post ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Pegar dados que vieram do request(alterando os dados do bda)

       
        $post->update($request->all());
        $autor = User::find($request->autor);
        $post->user()->associate($autor)->save();
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //delete do crud
       
        $post->delete();
        return redirect()->route('post.index');

    }
}
