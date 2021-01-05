<?php
# @Date:   2020-12-14T12:17:30+00:00
# @Last modified time: 2020-12-14T12:18:48+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileSignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_sign', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sign_id');
            $table->unsignedBigInteger('profile_id');
            $table->timestamps();
            $table->foreign('sign_id')->references('id')->on('signs');
            $table->foreign('profile_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_sign');
    }
}
