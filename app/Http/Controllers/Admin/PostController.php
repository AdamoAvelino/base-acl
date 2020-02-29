<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Post\PostCreate;
use App\Http\Controllers\Controller;
use App\Models\Admin\Post;

class PostController extends Controller
{
    /**
     * ---------------------------------------------------------------------------
     * Cria e lista todos os posts
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * ---------------------------------------------------------------------------
     * Cria a tela para mostrar os detalhes de um post individual
     *
     * @param [int] $id - id do post a ser apresentado
     * @return void
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show', compact('post'));
    }
    /**
     * ---------------------------------------------------------------------------
     * Apresenta um formulário com os dados de um post que podem ser alterados.
     * @param [int] $id - id do post a ser editado
     * @return void
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * ---------------------------------------------------------------------------
     * Apresenta um formulário com entradas para criar um post
     * @return void
     */
    public function create()
    {
        return view('admin.post.create');
    }
    /**
     * ---------------------------------------------------------------------------
     * Recolhe os dados da requisição trata e persiste os persiste na base de dados
     * caso tenha sucesso.
     * @param PostCreate $request - Objeto request que sanatiza os dados de entrada
     * @return metodo de redirecionamento caso criado com sucesso | metodo view com
     * injeção dos dodos de requisição caso tenha dado algum erro.
     */
    public function salvar(PostCreate $request)
    {
        $dataForm = $request->except('_token');
        $dataForm['user_id'] = auth()->user()->id;
        $post = Post::create($dataForm);
        if ($post->id) {
            session()->flash('success', "Post {$post->title} Criado com Sucesso");
            return redirect()->route('admin.post.edit', $post->id);
        } else {
            session()->flash('error', "Erro  ao Criar o Post {$post->title}");
            $post = $request;
            return view('admin.post.create', compact('post'));
        }
    }
    /**
     * ---------------------------------------------------------------------------
     * Recolhe os dados da requisição trata e os persiste na base de dados
     * caso tenha sucesso.
     * @param PostCreate $request Objeto request que sanatiza os dados de entrada
     * @param [int] $id id do post que será atualizado
     * @return metodo de redirecionamento
     */
    public function update(PostCreate $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;

        if ($post->save()) {
            session()->flash('success', "Post {$post->title} Atualizado com Sucesso");
        } else {
            session()->flash('error', "Erro  ao Excluir o Post {$post->title}");
        }

        return redirect()->route('admin.post.edit', $post->id);
    }
    /**
     * ---------------------------------------------------------------------------
     * Busca o registro de um post e deleta da base de dados
     * @param [int] $id id do post que será excluido
     * @return metodo de redirecionamento
     */
    public function delete($id)
    {
        $post = Post::find($id);

        if ($post->delete()) {
            session()->flash('success', "Post {$post->title} Excluido com Sucesso");
            return redirect()->route('admin.post');
        }
        session()->flash('Error', "Não foi Possível Excluir o Post {$post->title}");
        return redirect()->route('admin.post.edit', $id);
    }
}
