<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->date('dob')->nullable();
            $table->string('class')->nullable();
            $table->string('group')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_no')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending,1=paid,2=reject,3=selected');
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
        Schema::dropIfExists('student_admissions');
    }
}
