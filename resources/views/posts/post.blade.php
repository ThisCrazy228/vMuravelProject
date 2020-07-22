@extends('layouts.vmuravel')

@section('content')
    <div class="alert alert-primary">
        <h4>Название поста: {{ $post->name }}</h4>
        <h7>Содержание: {{ $post->content }}</h7><br>
        @if($post->file !== NULL)
            <h8><small>Выбранный файл: <a href="{{ asset($post->file) }}">CLICK</a></small></h8>
        @endif
    </div>
@endsection
