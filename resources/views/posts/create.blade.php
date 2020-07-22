@extends('layouts.vmuravel')
@section('title', 'Создание поста')

@section('content')

    <form action="{{ route('create-post', $category_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Введите название поста</label>
            <input type="text" name="name" placeholder="Придумайте название для поста" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="content">Введите описание для поста</label>
            <textarea name="content" id="content" class="form-control" placeholder="Введите описание"></textarea>
        </div>

        <div class="form-group">
            <label for="file">Выберите файл, который хотите загрузить (max: 2Mb)</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Создать пост</button>
    </form>

@endsection
