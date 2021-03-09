<?php
# @Date:   2021-03-09T17:27:35+00:00
# @Last modified time: 2021-03-09T17:30:03+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompatablitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compatablities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('first_sign_id')->unsigned();
            $table->bigInteger('second_sign_id')->unsigned();
            $table->bigInteger('weight')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compatablities');
    }
}
