<?php

use App\Models\Address;
use App\Models\Carrier;
use App\Models\PickUp;
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
        Schema::create('carriers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('provider');
            $table->string('receiver_name');
            $table->decimal('weight');
            $table->string('measurements');
            $table->enum('status', ['Aangemeld', 'Uitgeprint', 'Afgeleverd', 'Sorteercentrum', 'Onderweg'])->default('Aangemeld');
            $table->foreignIdFor(Carrier::class)->nullable();
            $table->foreignIdFor(Address::class)->nullable();
            $table->foreignIdFor(PickUp::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
        Schema::dropIfExists('carriers');
    }
};
