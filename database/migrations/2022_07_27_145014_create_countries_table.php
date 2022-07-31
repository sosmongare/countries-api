<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('countries')) {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->char('iso3',3);
            $table->char('numeric_code',3);
            $table->char('iso3',2);
            $table->string('phonecode',255);
            $table->string('capital',255);
            $table->string('currency',255);
            $table->string('currency_name',255);
            $table->string('currency_symbol',255);
            $table->string('tld',255);
            $table->string('native',255);
            $table->string('region',255);
            $table->string('subregion',255);
            $table->string('timezones',255);
            $table->string('translations',255);
            $table->decimal('latitude', $precision = 10, $scale = 8); // 1937000.56755555
            $table->decimal('longitude', $precision = 10, $scale = 8); 
            $table->string('emoji',191);
            $table->string('emojiU',191);
            $table->timestamps();
            $table->tinyInteger('flag');
            $table->string('wikiDataId',255);

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
