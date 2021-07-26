 {{-- Falando para a pagina que vai usar ela--}}
@extends('layouts.app')


 {{-- Esse bloco todo vai ser utilizado na app.blade--}}
 @section('content')
     


<form action="{{route('post.store')}}" method="post">
    @csrf
    <div class="form-group">

        <label for="title">Titulo:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
    </div>

    <div class="form-group">

        <label for="description">Descriçaõ:</label>
        <input type="text" name="description" id="description" class="form-control" value="{{old('description')}}">
    </div>

    <div class="form-group">

        <label for="content">Conteúdo</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
    </div>

    <div class="form-group">

        <label for="slug">Slug:</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug')}}"> <!-- Passar os name do value -->
    </div>

    <div class="form-group">

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control" value="{{old('autor')}}"> <!-- Passar os name do value -->
    </div>

    <button class="btn btn-lg btn-success" type="submit">Criar postagem</button>

</form>
@endsection

@section('subtitle')
    Criar postagem
@endsection