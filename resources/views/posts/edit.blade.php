@extends('layouts.vmuravel')
@section('title', 'Редактирование поста №: ' . $post->id)

@section('content')

    <form action="{{ route('edit-post', $category_id . '_' . $post->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Измените название</label>
            <input type="text" name="name" placeholder="Придумайте название для поста" value="{{ $post->name }}" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="content">Измените описание</label>
            <textarea name="content" id="content" class="form-control" placeholder="Введите описание">{{ $post->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="file">Выберите файл, который хотите загрузить (max: 2Mb)</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Обновить пост</button>
    </form>

@endsection
