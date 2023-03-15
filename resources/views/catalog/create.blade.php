@extends('layouts.main')
@section('content')
<div>
<form action = "{{ route('cat.store') }}" method="post" class="row g-3">
@csrf
  <div class="col-md-6">
  <div class="col-12">
    <label for="inputAddress" class="form-label">Марка</label>
    <input value="{{old('title')}}" type="text" name="title" class="form-control" id="inputCarMark" placeholder="Mercedes, Audi, BMW...">

    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Модель</label>
    <input value="{{old('content')}}" type="text" name="content" class="form-control" id="inputCarModel" placeholder="GLE, A100, B32...">
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Фото</label>
    <input type="text" name="image" class="form-control" id="inputCarModel" placeholder="URL">
  </div>
  <br>
  <label for="category">Категория</label>
  <select class="form-select" aria-label="Default select example" name="category_id">
    @foreach ($categories as $category)
  <option 
  {{old('category_id') == $category->id ? 'selected' : ''}}
  value="{{$category->id}}">{{$category->title}}</option>
  @endforeach
</select>
  <br>
  <div>
  @foreach ($tags as $tag)
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tags" name="tags[]">
  <label class="form-check-label" for="flexCheckChecked">
  {{$tag->title}}
  </label>
  </div>
@endforeach
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Отправить</button>
  </div>
</form>   
</div>

@endsection