@extends('layouts.vmuravel')
@section('title', 'Все категории')
@section('content')
     <h1>Все категории</h1>
     <a href="{{ route('create-category-page') }}"><button class="btn btn-info">Создать категорию</button></a>

    @foreach($categories as $category)
        <div class="alert alert-info">
            <h3>{{ $category->name }}</h3>

            <h6>{{ $category->description }}</h6>
            <h6><small>{{ $category->created_at }}</small></h6>
            <a href="{{ route('posts-page', $category->id) }}"><button class="btn btn-success">Открыть</button></a>
            <a href="{{ route('edit-category-page', $category->id) }}"><button class="btn btn-warning">Редактировать</button></a>
            <a href="{{ route('delete-category', $category->id) }}"><button class="btn btn-danger">Удалить</button></a>
        </div>
    @endforeach
@endsection
