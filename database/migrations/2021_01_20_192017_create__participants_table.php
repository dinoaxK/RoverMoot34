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
            $table->string('image')->nullable();
            $table->integer('user_id')->unique();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_names')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('initials')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('id_type')->nullable();
            $table->string('number')->unique()->nullable();
            $table->string('scout_award')->nullable();
            $table->date('scout_award_date')->nullable();
            $table->string('rover_award')->nullable();
            $table->date('rover_award_date')->nullable();
            $table->string('participant_type')->nullable();
            $table->string('warrant_number')->nullable();
            $table->string('warrant_rank')->nullable();
            $table->string('warrant_section')->nullable();
            $table->date('warrant_expire')->nullable();
            $table->integer('crew_number')->nullable();
            $table->string('crew_district')->nullable();
            $table->string('crew_name')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('telephone', 15)->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->integer('zip')->nullable();
            $table->string('contact_person_title')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_mobile', 15)->nullable();
            $table->string('contact_person_telephone', 15)->nullable();
            $table->string('education')->nullable();
            $table->boolean('application_submit')->default(0);
            $table->date('submit_date')->nullable();
            $table->string('application_proof')->nullable();
            $table->string('application_status')->nullable();
            $table->boolean('payment_submit')->default(0);
            $table->date('payment_date')->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('payment_proof')->nullable();
            $table->string('payment_status')->nullable();
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
