@extends('layouts.vmuravel')
@section('title', 'Все посты')
@section('content')
    <h1>Все посты из категории №{{ $category_id }}</h1>
    <a href="{{ route('create-post-page', $category_id) }}"><button class="btn btn-info">Создать пост</button></a>
    @include('comment')
    @foreach($posts as $post)
        <div class="alert alert-info">
            <h3>{{ $post->name }}</h3>

            <h6>{{ $post->content }}</h6>
            <h6><small>{{ $post->created_at }}</small></h6>
            <a href="{{ route('post-page', $category_id . '_' . $post->id) }}"><button class="btn btn-success">Открыть</button></a>
            <a href="{{ route('edit-post-page', $category_id) }}"><button class="btn btn-warning">Редактировать</button></a>
            <a href="{{ route('delete-post', $post->id) }}"><button class="btn btn-danger">Удалить</button></a>
        </div>
    @endforeach
@endsection

