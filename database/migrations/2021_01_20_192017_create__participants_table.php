<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();            
            $table->string('reg_no')->unique()->nullable();
            $table->integer('user_id')->unique();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_names')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('initials')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('id_type')->nullable();
            $table->bigInteger('nic')->unique()->nullable();
            $table->string('scout_award')->nullable();
            $table->date('scout_award_date')->nullable();
            $table->string('rover_award')->nullable();
            $table->date('rover_award_date')->nullable();
            $table->string('warrant_number')->nullable();
            $table->string('warrant_section')->nullable();
            $table->date('warrant_expire')->nullable();
            $table->integer('crew_number')->nullable();
            $table->string('crew_district')->nullable();
            $table->string('crew_name')->nullable();
            $table->integer('mobile')->nullable();
            $table->integer('telephone')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->integer('zip')->nullable();
            $table->string('contact_person_title')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->integer('contact_person_mobile')->nullable();
            $table->integer('contact_person_telephone')->nullable();
            $table->string('education')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
