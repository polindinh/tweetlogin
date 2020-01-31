@extends ('layouts.app')

@section('content')
    @guest
    <div class="row justify-content-center">
        <p>You are not authorized to access this page. Please login or register</p>
    </div>
    @else
        <p><strong>{{$tweets-> author}}</strong></p>
        <p>{{$tweets-> content}}</p>

        <form action="/home/profile/tweetUpdate" method="post">
            @csrf
            <input type="hidden" name="author" value={{Auth::user()->name}} >
            <textarea  rows="4" cols="50" type="text" name="content" placeholder="New Content" ></textarea>
            <button class="btn" type="submit" name="id" value ="{{$tweets->id}}">Update</button>
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
