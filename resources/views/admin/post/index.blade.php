@extends('layouts.admin')
@section('content')
<div>

<h1>Каталог</h1>
@foreach($posts as $post)
<div><a href="{{route('cat.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
@endforeach
<div>
<a href="{{route('cat.create')}}" class="btn btn-primary">Создать</a>
</div>
<div class="mt-5">
    {{$posts->withQueryString()->links()}}
</div>
</div>
@endsection