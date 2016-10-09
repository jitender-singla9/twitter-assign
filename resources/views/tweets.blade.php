@foreach($tweetArray as $k => $tweet)
    @if($k%2 == 0)<div class="row jumbotron">@endif
        <div class="col-md-6 text-left">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="{{ $tweet->user_avatar }}" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    @if($tweet->in_reply_to)
                        <div class="col-md-12">
                            In reply to {{ $tweet->in_reply_to }}
                        </div>
                    @endif
                    <div class="col-md-11">
                        <p class="text-heading">{{ $tweet->user_name }}</p>
                        <span><a href="{{ $tweet->user_website }}"><i>@</i>{{ $tweet->user_screen_name }}</a></span>
                        <span> - {{ date_format(date_create($tweet->tweet_date), 'Y-m-d') }}</span>
                        <span> - <i class="fa fa-map-marker"> {{ $tweet->user_location }}</i></span>
                    </div>
                    <div class="col-md-12">{{ $tweet->text }}</div>
                    <div class="col-md-12">
                        <ul class="list-inline">
                            <li>Followers: {{ $tweet->user_followers }}</li>
                            <li>Friends: {{ $tweet->user_friends }}</li>
                            <li>Total Retweets: {{ $tweet->retweet_count }}</li>
                        </ul>
                    </div>
                    <div class="col-md-12">From: {!! $tweet->source !!}</div>
                </div>
            </div>
        </div>
    @if($k%2 != 0)</div>@endif
@endforeach