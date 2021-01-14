<?php
# @Date:   2020-12-14T11:47:55+00:00
# @Last modified time: 2021-01-14T11:54:38+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenderProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender_profile', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();
            $table->timestamps();
            $table->foreign('gender_id')->references('id')->on('genders')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('gender_profile');
    }
}
