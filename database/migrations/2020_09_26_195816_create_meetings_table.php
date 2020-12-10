<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->string('meetingID');
            $table->string('description');
            $table->string('moderatorPW');
            $table->string('attendeePW');
            $table->boolean('isActive');
            $table->boolean('isInstant');
            $table->timestamp('startDateTime')->useCurrent();
            $table->timestamp('endDateTime')->useCurrent();
            $table->string('urlCode')->nullable();
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
        Schema::dropIfExists('meetings');
    }
}
