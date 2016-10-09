<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterPost extends Model
{
    protected $fillable = ['tweet_id', 'text', 'source', 'in_reply_to', 'user_name', 'user_screen_name', 'user_location', 'user_description', 'user_website', 'user_followers', 'user_friends', 'user_account_registration_date', 'user_avatar', 'retweet_count', 'language_code', 'tweet_date'];
}
