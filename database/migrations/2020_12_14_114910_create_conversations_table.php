<?php
# @Date:   2020-12-14T11:49:11+00:00
# @Last modified time: 2020-12-14T12:31:51+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
              $table->string('title');
              $table->unsignedBigInteger('sender_id');
              $table->unsignedBigInteger('recipient_id');
              $table->timestamps();
              $table->foreign('sender_id')->references('id')->on('profiles');
              $table->foreign('recipient_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
