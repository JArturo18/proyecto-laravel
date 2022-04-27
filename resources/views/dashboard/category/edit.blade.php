@extends('dashboard.layout')
@section('content')

<h1>Actualizar Categroy: {{ $category->title }}</h1>

<form action="{{ route('category.update',$category->id) }}" method="post">
    @method("PATCH")
@csrf


    @include('dashboard.category._form')


    {{-- <label for="">Titulo</label>
    <input type="text" name="title" value="{{ $post->title }}">

    <label for="">Slug</label>
    <input readonly type="text" name="slug" value="{{ $post->slug }}">

    <label for="">Categoria</label>
    <select name="category_id">
        <option value=""></option>
    @foreach ($categories as $title => $id)
        <option {{$post->category_id == $id ? 'selected' : '' }} value="{{ $id }}">{{ $title }}</option>
    @endforeach
    </select>

    <label for="">Posteado</label>
    <select name="posted">
        <option {{$post->posted == "not" ? 'selected' : '' }} value="not">No</option>
        <option {{$post->posted == "yes" ? 'selected' : '' }} value="yes">Si</option> 
    </select>

    <label for="">Contenido</label>
    <textarea name="content">{{ $post->content }}</textarea>
    
    <label for="">Descripciôn</label>
    <textarea name="description"> {{ $post->description }}</textarea>
    
    <button type="submit">Enviar</button> --}}

</form>
@endsection

{{--     
</body>
</html> --}}