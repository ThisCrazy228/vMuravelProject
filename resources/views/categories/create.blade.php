@extends('layouts.vmuravel')
@section('title', 'Создание категории')

@section('content')

<form action="{{ route('create-category') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Введите название категории</label>
        <input type="text" name="name" placeholder="Придумайте название для категории" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Введите описание</label>
        <textarea name="description" id="description" class="form-control" placeholder="Введите описание"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Создать категорию</button>
</form>

@endsection
