<?php
# @Date:   2020-12-14T12:17:30+00:00
# @Last modified time: 2021-01-14T11:57:28+00:00




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
            $table->bigInteger('sign_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();
            $table->timestamps();
            $table->foreign('sign_id')->references('id')->on('signs')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('profile_id')->references('id')->on('profiles')->onUpdate('cascade')->onDelete('restrict');
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
