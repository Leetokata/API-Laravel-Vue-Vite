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
        Schema::create('listas', function (Blueprint $table) {
            $table->id();
            $table->string('consecutive')->nullable()->unique();
            $table->string('activity_name');
            $table->foreignId('cultural_right_id');
            $table->foreignId('nac_id');
            $table->date('activity_date');
            $table->time('start_time');
            $table->time('final_hour');
            $table->foreignId('expertise_id');
            $table->timestamp('fecha');

            $table->foreign('cultural_right_id')->references('id')->on('cultural_rights');
            $table->foreign('nac_id')->references('id')->on('nacs');
            $table->foreign('expertise_id')->references('id')->on('expertises');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas');
    }
};
