@if(Session::has('message'))
    <span class="text-success">
        <p>{{ Session::get('message') }}</p>
    </span>
@endif
