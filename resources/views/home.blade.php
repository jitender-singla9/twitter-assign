@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Jumbotron -->
        <div class="jumbotron text-center">
            <h1>Hello, WhiteSpace Studio!</h1>
            <p class="lead"></p>
            @if(Auth::check())
                <p><a class="btn btn-lg btn-success" href="javascript:void(0);" onclick="javascript:getTweets()" role="button">Get Latest Tweets</a></p>
            @else
                <p><a class="btn btn-lg btn-success" href="{{ url('auth/twitter') }}">Login to Continue</a></p>
            @endif
        </div>
        @if(Auth::check())
            <div id="tweeter-results"></div>
        @endif
    </div>
</div>
@endsection
@section('footer-scripts')
    <script type="text/javascript">
        function getTweets()
        {
            $.ajax({
                url: "{{ route('twitter.tweets') }}",
                type: "GET",
                success: function(data) {
                    $('#tweeter-results').html(data);
                }
            })
        }
    </script>
@endsection