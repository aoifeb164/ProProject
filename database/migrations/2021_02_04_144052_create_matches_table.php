<?php
# @Date:   2021-02-04T14:40:53+00:00
# @Last modified time: 2021-03-10T16:11:26+00:00




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
            $table->enum('status', ['pending', 'accepted', 'rejected']);
            $table->timestamps();
            $table->foreign('matcher_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('matchee_id')->references('id')->on('profiles')->onDelete('cascade');
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
