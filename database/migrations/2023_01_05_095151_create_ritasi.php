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
        Schema::create('ritasi', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('site');
            $table->string('date');
            $table->string('shift');
            $table->string('time');
            $table->string('nikloader');
            $table->string('oploader');
            $table->string('nikhauler');
            $table->string('codeloader');
            $table->string('modelloader');
            $table->string('codehauler');
            $table->string('modelhauler');
            $table->string('block');
            $table->string('pit');
            $table->string('distance');
            $table->string('ritase');
            $table->string('material');
            $table->string('submaterial');
            $table->string('produksi')->nullable();
            $table->string('adjustment')->nullable();
            $table->string('distvol')->nullable();
            $table->string('factor');
            $table->text('detail');
            $table->string('dumping');            
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
        Schema::dropIfExists('ritasi');
    }
};
