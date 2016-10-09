<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitterPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitter_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tweet_id');
            $table->longText('text');
            $table->string('source');
            $table->string('in_reply_to')->nullable();
            $table->string('user_name');
            $table->string('user_screen_name');
            $table->string('user_location');
            $table->longText('user_description');
            $table->string('user_website');
            $table->string('user_followers');
            $table->string('user_friends');
            $table->string('user_account_registration_date');
            $table->string('user_avatar');
            $table->string('retweet_count');
            $table->string('language_code');
            $table->timestamp('tweet_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('twitter_posts');
    }
}
