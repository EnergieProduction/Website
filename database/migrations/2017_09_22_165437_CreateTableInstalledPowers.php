<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInstalledPowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installed_powers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_id');            
            $table->string('power');
            $table->boolean('active')->default(false);
            $table->timestamp('created_at')->nullable();
        });

        Schema::table('installed_powers', function(Blueprint $table) {
            $table->foreign('source_id')
                ->references('id')
                ->on('sources')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('sources', function(Blueprint $table) {
            $table->foreign('installed_powers_id')
                ->references('id')
                ->on('installed_powers')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installed_powers');
    }
}
