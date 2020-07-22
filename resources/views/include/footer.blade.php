<footer class="alert alert-dark" style="bottom: 0; margin: 0; width: 100%; padding-top: 40px;position: fixed">
    Уникальные пользователи: <br>
    @foreach($browsers as $browser => $count)
        {{ $browser }}: {{ $count }} |
    @endforeach
</footer>
