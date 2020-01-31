@extends ('layouts.app')


@section ('content')
    @guest
    <div class="tweetContent">
    <div class="row justify-content-center">
        <p>You are not authorized to access this page. Please login or register</p>
    </div>
    @else
    <h1>Welcome {{Auth::user()->name}}</h1>

    <h3>Recent Tweets</h3>
    <div>
        @foreach ($tweets as $tweet)
            @if ($tweet-> author == Auth::user()->name)
                <p><strong>{{$tweet-> author}}</strong></p>
                <p>{{$tweet-> content}}</p>
                <p><i>Created at: {{$tweet-> created_at}}</i></p>

                <div class="button">
                    <form action="/home/profile/Tweet" method="post">
                        @csrf
                        <button class="btn" type="submit" name="id" value ="{{$tweet->id}}">View Post</button>
                    </form>
                </div>
                <div class="button">
                    <form action="/home/profile/editForm" method="get">
                        @csrf
                        <button class="btn" type="submit" name="id" value ="{{$tweet->id}}">Edit</button>
                    </form>
                </div>
                <div class="button">
                    <form action="/home/profile/tweetDelete" method="post">
                        @csrf
                        <button class="btn" type="submit" name="id" value ="{{$tweet->id}}">Delete</button>
                    </form>
                </div>
                <br>
                <hr>

            @else
                <p><strong>{{$tweet-> author}}</strong></p>
                <p>{{$tweet-> content}}</p>
                <p><i>Created at: {{$tweet-> created_at}}</i></p>
            @endif

        @endforeach
        <h3>New Tweet</h3>
        <form action="/home/profile" method="post">
            @csrf
            <input type="hidden" name="author" value={{Auth::user()->name}} >
            <input type="text" name="content" placeholder="content" >
            <input class="btn" type="submit" name="submit" value="Create Tweet" >
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
    </div>
    @endguest
</div>
@endsection
