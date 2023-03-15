@extends('layouts.main')
@section('content')
<div>
<form action = "{{route('cat.update', $post->id)}}" method="post" class="row g-3">
@csrf
@method('patch')
  <div class="col-md-6">
  <div class="col-12">
    <label for="inputAddress" class="form-label">Марка</label>
    <input type="text" name="title" class="form-control" id="inputCarMark" placeholder="Mercedes, Audi, BMW..." value="{{$post->title}}">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Модель</label>
    <input type="text" name="content" class="form-control" id="inputCarModel" placeholder="GLE, A100, B32..." value="{{$post->content}}">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Фото</label>
    <input type="text" name="image" class="form-control" id="inputCarModel" placeholder="URL" value="{{$post->image}}">
  </div>
  <br>
  <label for="category">Категория</label>
  <select class="form-select" aria-label="Default select example" name="category_id">
    @foreach ($categories as $category)
  <option 
  {{$category->id === $post->category->id ? 'selected' : ''}} 
  value="{{$category->id}}">
  {{$category->title}}</option>
  @endforeach
</select>
  <br>
  <div>
  @foreach ($tags as $tag)
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tags" name="tags[]" 
  @foreach ($post->tags as $postTag)
  {{$tag->id === $postTag->id ? 'checked' : ''}} 
  @endforeach
  >
  <label class="form-check-label" for="flexCheckChecked">
  {{$tag->title}}
  </label>
  </div>
@endforeach
  </div>
  <br>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Обновить</button>
  </div>
</form>   
</div>

@endsection