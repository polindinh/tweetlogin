@extends ('layouts.app')

@section('content')

@foreach ($tweets as $tweet)
<p><strong>{{$tweet-> author}}</strong></p>
<p>{{$tweet-> content}}</p>
@endforeach

@endsection
