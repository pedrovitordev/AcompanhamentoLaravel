{{-- Falando para a pagina que vai usar ela --}}
@extends('layouts.app')


{{-- Esse bloco todo vai ser utilizado na app.blade --}}
@section('content')

    <form action="{{route('categories.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" name="description" id="description" class="form-control" value="{{old('description')}}">
        </div>
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug')}}">
        </div>
        <button class="btn btn-lg btn-sucess">Criar Categoria</button>
    </form>
@endsection
