<?php
# @Date:   2020-12-14T11:51:28+00:00
# @Last modified time: 2021-03-10T16:11:27+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
              $table->text('message');
              $table->unsignedBigInteger('conversation_id');
              $table->unsignedBigInteger('sender_id');
              $table->timestamps();
              $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
