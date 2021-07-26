 {{-- Falando para a pagina que vai usar ela --}}
 @extends('layouts.app')


 {{-- Esse bloco todo vai ser utilizado na app.blade --}}
 @section('content')

     <div class="row">

         <div class="col-sm-12">
             <a href="{{ route('post.create') }}" class="btn btn-sucess float-right">Criar Postagem</a>
             <h2>Postagens Blog</h2>
             <div class="clearflix"></div>
         </div>

         <table class="table table-striped">
             <thead>
                 <tr>

                     <th>#</th>
                     <th>Título</th>
                     <th>Autor</th>
                     <th>Status</th>
                     <th>Criado em</th>
                     <th>Ações</th>

                 </tr>
             </thead>

             <tbody>
                 @forelse ($posts as $post) {{-- pegando oque está sendo mandado no controller (index) --}}

                     <tr>

                         <td>{{ $post->id }}</td>
                         <td>{{ $post->title }}</td>
                         <td>{{ $post->user->name }}</td>

                         <td>

                             @if ($post->is_active)
                                 <span class="badge badge-success">Ativo</span>
                             @else
                                 <span class="badge badge-danger">Inativo</span>
                             @endif

                         </td>

                         <td>{{ date('d/m/y H:i:s', strtotime($post->created_at)) }}</td>
                         <td>

                             <div class="btn-group">
                                 <a href="{{ route('post.edit', ['post' => $post->id]) }}" 
                                     class="btn btn-sm btn-primary">Editar</a>

                                 <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">

                                     @csrf
                                     @method('DELETE')

                                     <button class="btn btn-sm btn-danger" type="submit">Deletar</button>
                                 </form>
                             </div>
                         </td>

                     </tr>

                 @empty

                     <tr>
                         <td colspan="4">Nada encontrado!!</td>
                     </tr>

                 @endforelse
             </tbody>
         </table>

         {{$posts->links()}}

     </div>

 @endsection
