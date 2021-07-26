 {{-- Falando para a pagina que vai usar ela--}}
 @extends('layouts.app')


 {{-- Esse bloco todo vai ser utilizado na app.blade--}}
 @section('content')

{{-- Form do update --}}


<form action="{{route('post.update' , ['post' => $post->id])}}" method="post">

    @csrf
    @method('PUT')
    <div class="form-group">

        <label for="title">Titulo:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
    </div>

    <div class="form-group">

        <label for="description">Descriçaõ:</label>
        <input type="text" name="description" id="description" class="form-control" value="{{$post->description}}">
    </div>

    <div class="form-group">

        <label for="content">Conteúdo</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
    </div>

    <div class="form-group">

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control" value="{{$post->user->id}}"> <!-- Passar os name do value -->
    </div>

    <div class="form-group">

        <label for="slug">Slug:</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{$post->slug}}"> <!-- Passar os name do value -->
    </div>

    <button class="btn btn-lg btn-success" type="submit">Alterar postagem</button>

</form>

{{-- Form do delete --}}

<form action="{{route('post.destroy' , ['post' => $post->id])}}" method="post">

    @csrf
    @method('DELETE')

    <button class="btn btn-lg btn-danger" type="submit">Deletar postagem</button>
</form>


@section('subtitle')
    Editar postagem
@endsection