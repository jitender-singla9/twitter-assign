<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Twitter;

use App\TwitterPost;

class TwitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = Twitter::getUserTimeline(['screen_name' => 'kamaalrkhan', 'count' => 10, 'format' => 'json']);

        $tweets = json_decode($tweets, true);

        foreach($tweets as $key => $tweet) {
            if($post = TwitterPost::where('tweet_id', $tweet['id_str'])->first()) {
                $tweetArray[$key] = $post;
            } else {
                $tweetArray[$key] = TwitterPost::create([
                    'tweet_id' => $tweet['id_str'],
                    'text' => utf8_encode($tweet['text']),
                    'source' => $tweet['source'],
                    'in_reply_to' => $tweet['in_reply_to_screen_name'],
                    'user_name' => $tweet['user']['name'],
                    'user_screen_name' => $tweet['user']['screen_name'],
                    'user_location' => $tweet['user']['location'],
                    'user_description' => $tweet['user']['description'],
                    'user_website' => $tweet['user']['url'],
                    'user_followers' => $tweet['user']['followers_count'],
                    'user_friends' => $tweet['user']['friends_count'],
                    'user_account_registration_date' => date_format(date_create($tweet['user']['created_at']), 'Y-m-d H:i:s'),
                    'user_avatar' => $tweet['user']['profile_image_url'],
                    'retweet_count' => $tweet['retweet_count'],
                    'language_code' => $tweet['lang'],
                    'tweet_date' => date_create($tweet['created_at'])
                ]);
            }
        }

        return view('tweets', compact('tweetArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
