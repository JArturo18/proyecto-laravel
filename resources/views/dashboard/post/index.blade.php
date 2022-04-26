@extends('dashboard.layout')

@section('content')

<a href="{{ route("post.create") }}">Cresar</a>

<table>
<thead>

<tr>
    <th>Titulo</th>
    <th>Categoria</th>
    <th>Posted</th>
    <th>Acciones</th>
</tr>
</thead>
<div class="cdmx">Secretaria de Finanzas</div>

<tbody>
    @foreach ($posts as $p)
    <tr>
        <td>{{$p->title}}</td>
        <td>
            {{$p->category->title }}
        </td> 
        <td>{{ $p->posted }}</td>
        <td>
            <a href="{{ route("post.edit", $p) }}">Editar</a>
            <a href="{{ route("post.show", $p) }}">ver</a>
            <a href="{{ route("post.destroy", $p) }}">Eliminar</a>
            
        </td>
    </tr>
    @endforeach
</tbody>
</table>

{{$posts->links()}}

@endsection  