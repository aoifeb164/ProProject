<?php
# @Date:   2020-12-14T11:40:39+00:00
# @Last modified time: 2020-12-14T12:58:42+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
              $table->string('name');
              $table->string('bio');
              $table->date('dob');
              $table->unsignedBigInteger('user_id');
              $table->unsignedBigInteger('gender_id');
              $table->unsignedBigInteger('sign_id');
              $table->unsignedBigInteger('photo_id')->nullable(); //main profile image
              $table->timestamps();
              $table->foreign('user_id')->references('id')->on('users');
              $table->foreign('gender_id')->references('id')->on('genders');
              $table->foreign('sign_id')->references('id')->on('signs');
              $table->foreign('photo_id')->references('id')->on('photos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
