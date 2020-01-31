@extends ('layouts.app')

@section('content')

<p><strong>{{$tweets-> author}}</strong></p>
<p>{{$tweets-> content}}</p>

<div class="button">
    <form action="/home/profile/editForm" method="get">
        @csrf
        <button class="btn" type="submit" name="id" value ="{{$tweets->id}}">Edit</button>
    </form>
</div>
<div class="button">
    <form action="/home/profile/tweetDelete" method="post">
        @csrf
        <button class="btn" type="submit" name="id" value ="{{$tweets->id}}">Delete</button>
    </form>
</div>

@endsection
