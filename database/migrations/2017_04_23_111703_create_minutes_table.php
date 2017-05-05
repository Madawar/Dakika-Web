<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minutes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meetingId')->unsigned()->nullable();
            $table->json('recording_filenames')->nullable();
            $table->json('minutes')->nullable();
            $table->json('agenda')->nullable();
            $table->json('attendants')->nullable();
            $table->text('hash')->nullable();
            $table->foreign('meetingId')
                ->references('id')->on('meetings')
                ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minutes');
    }
}
