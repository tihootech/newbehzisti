<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_applies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('person_id');
            $table->string('uid')->unique();

            $table->string('license_type');
            $table->string('license_system');
            $table->string('plan_title');
            $table->string('insurance_status');
            $table->string('workshop_name');
            $table->string('monthly_amount');
            $table->string('shaba');
            $table->string('bank');

            $table->boolean('finished')->default(0);
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
        Schema::dropIfExists('insurance_applies');
    }
}
