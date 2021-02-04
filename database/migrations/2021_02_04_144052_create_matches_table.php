<?php
# @Date:   2021-02-04T14:40:53+00:00
# @Last modified time: 2021-02-04T14:42:28+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matcher_id');
            $table->unsignedBigInteger('matchee_id');
            $table->timestamps();
            $table->foreign('matcher_id')->references('id')->on('profiles');
            $table->foreign('matchee_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
