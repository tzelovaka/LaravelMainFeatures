@extends('layouts.main')
@section('content')
<div>
    <div>
        <h2>{{$post->id}}. {{$post->title}}</h2>
        <p>{{$post->content}}</p>
    </div>
    <div>
        <form action="{{route('cat.delete', $post->id)}}" method="POST">
            @csrf
            @method('delete')
        <input type="submit" value="Удалить" class="btn btn-primary">
        </form>
    </div>
    <br>
    <div>
        <a href="{{route('cat.edit', $post->id)}}" class="btn btn-primary">Обновить</a>
    </div>
    <div>
        <a href="{{route('cat.index')}}">Назад</a>
    </div>
</div>
@endsection