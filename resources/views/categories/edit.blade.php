@extends('layouts.vmuravel')
@section('title', 'Редактирование категории ID: ' . $category->id)

@section('content')

    <form action="{{ route('edit-category', $category->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Измените название</label>
            <input type="text" name="name" placeholder="Придумайте название для категории" value="{{ $category->name }}" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Измените описание</label>
            <textarea name="description" id="description" class="form-control" placeholder="Введите описание">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Обновить категорию</button>
    </form>

@endsection
