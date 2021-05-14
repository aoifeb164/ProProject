<?php
# @Date:   2020-12-14T11:46:11+00:00
# @Last modified time: 2021-03-10T16:04:42+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_relationship', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('relationship_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();
            $table->timestamps();
            $table->foreign('relationship_id')->references('id')->on('relationships')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_relationship');
    }
}
