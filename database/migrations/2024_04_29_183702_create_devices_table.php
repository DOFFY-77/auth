<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('info_device');
            $table->string('reference');
            $table->string('status')->default('active');
            
            // $table->foreign("establishment_id")->references('id')->on("establishments");
            $table->foreign("class_id")->references('id')->on("classes")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("marque_id")->references('id')->on("marques")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('type_id')->references('id')->on('types')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->unsignedBigInteger("class_id");
            $table->unsignedBigInteger("marque_id");
            $table->unsignedBigInteger("type_id");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
