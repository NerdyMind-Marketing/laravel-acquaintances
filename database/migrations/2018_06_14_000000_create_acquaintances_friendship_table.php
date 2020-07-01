<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcquaintancesFriendshipTable extends Migration
{

    public function up()
    {

        Schema::create(config('acquaintances.tables.friendships'), function (Blueprint $table) {
//            $table->increments('id');
//            $table->morphs('sender');
//            $table->morphs('recipient');
//            $table->string('status')->default('pending')->comment('pending/accepted/denied/blocked/');
//            $table->timestamps();

            $table->uuid('id')->primary();
            $table->uuid('sender_id'); $table->string('sender_type');
            $table->uuid('recipient_id'); $table->string('recipient_type');
            $table->string('status')->default('pending')->comment('pending/accepted/denied/blocked/');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists(config('acquaintances.tables.friendships'));
    }

}
