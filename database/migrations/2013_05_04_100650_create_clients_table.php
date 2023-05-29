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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->boolean('is_superadmin')->default(1);
            $table->boolean('is_approved')->default(1);
            $table->boolean('is_subscribed')->default(1);
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
        Schema::dropIfExists('clients');
    }
};
