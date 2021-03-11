<?php
# @Date:   2020-12-14T11:49:11+00:00
# @Last modified time: 2021-03-10T16:01:24+00:00




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
              $table->foreign('sender_id')->references('id')->on('profiles')->onDelete('cascade');;
              $table->foreign('recipient_id')->references('id')->on('profiles')->onDelete('cascade');;
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
