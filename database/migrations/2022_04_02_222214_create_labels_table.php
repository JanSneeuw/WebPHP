<?php

use App\Models\Address;
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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('qrcode_link')->nullable();
            $table->string('receiver_name');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->foreignIdFor(Package::class);
            $table->timestamps();

            $table->fullText('receiver_name');
            $table->fullText('street');
            $table->fullText('city');
            $table->fullText('state');
            $table->fullText('zip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
};
