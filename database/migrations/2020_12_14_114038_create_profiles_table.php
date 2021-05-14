<?php
# @Date:   2020-12-14T11:40:39+00:00
# @Last modified time: 2021-05-14T13:28:34+01:00




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
              $table->text('bio');
              $table->date('dob');
              $table->text('location');
              $table->unsignedBigInteger('user_id');
              $table->unsignedBigInteger('gender_id');
              $table->unsignedBigInteger('sign_id');
              $table->unsignedBigInteger('photo_id')->nullable(); //main profile image
              $table->timestamps();
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
              $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
              $table->foreign('sign_id')->references('id')->on('signs')->onDelete('cascade');
              $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');

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
