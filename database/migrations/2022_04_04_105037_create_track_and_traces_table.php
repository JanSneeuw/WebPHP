<?php

use App\Models\Feedback;
use App\Models\Package;
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
        Schema::create('track_and_traces', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(\App\Models\User::class)->nullable();
            $table->foreignIdFor(Package::class);
            $table->foreignIdFor(Feedback::class)->nullable();
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
        Schema::dropIfExists('track_and_traces');
    }
};
