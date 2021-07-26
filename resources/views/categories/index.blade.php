 {{-- Falando para a pagina que vai usar ela --}}
 @extends('layouts.app')


 {{-- Esse bloco todo vai ser utilizado na app.blade --}}
 @section('content')

     <div class="row">
         <div class="col-sm-12">
             <a href="{{ route('categories.create') }}" class="btn btn-sucess float-right">Criar categoria</a>
             <h2>Categoria</h2>
             <div class="clearfix"></div>
         </div>
     </div>
     <div class="row">
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Nome</th>
                     <th>Criado em</th>
                     <th>Ações</th>
                 </tr>
             </thead>
             <tbody>

                 @forelse ($categories as $category)
                     <tr>
                         <td>{{ $category->id }}</td>
                         <td>{{ $category->name }}</td>
                         <td>{{ date('d/m/Y H:i:s', strtotime($category->created_at)) }}</td>
                         <td>

                             <div class="btn-group">

                                 <a href="{{ route('categories.show', ['category' => $category->id]) }}"
                                     class="btn btn-sm btn-primary">Editar</a>

                                 <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                     method="post">
                                     @csrf
                                     @method('DELETE')
                                     <input type="submit" value="Remover" class="btn btn-sm btn-danger ">
                                 </form>
                                 
                             </div>
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td colspan="4">Nenhuma categoria cadastrada</td>
                     </tr>
                 @endforelse
             </tbody>

         </table>
         {{$categories->links()}}
     </div>
 @endsection
