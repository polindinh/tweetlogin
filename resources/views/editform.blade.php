@extends ('layouts.app')

@section('content')
    @guest
    <div class="row justify-content-center">
        <p>You are not authorized to access this page. Please login or register</p>
    </div>
    @else
        @foreach ($tweets as $tweet)
            <p><strong>{{$tweet-> author}}</strong></p>
            <p>{{$tweet-> content}}</p>
        @endforeach

        {{-- @php
        print_r($tweets)
    @endphp --}}
        <form action="/home/profile/tweetUpdate" method="post">
            @csrf
            <input type="hidden" name="author" value={{Auth::user()->name}} >
            <input type="text" name="content" placeholder="content" >
            <button class="btn" type="submit" name="id" value ="{{$tweet->id}}">Update</button>
        </form>
        @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    @endguest
@endsection
