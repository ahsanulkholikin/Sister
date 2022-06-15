<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identities', function (Blueprint $table) {
            // $table->id();
            $table->string('idNumber',20)->primary()->nullable(false);
            $table->string('fullname',100)->nullable(false);
            $table->enum('gender', ['male','female'])->nullable(false);
            $table->enum('IDType', ['KTP','Passport'])->default('KTP')->nullable(false);
            $table->text('address')->nullable(false);
            $table->string('religion',50)->nullable(false);
            $table->enum('maritalStatus', ['single','married','divorcee'])->nullable(false);
            $table->string('pob',50)->nullable(false);
            $table->date('dob')->nullable(false);
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
        Schema::dropIfExists('identities');
    }
};
