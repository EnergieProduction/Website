<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_id');            
            $table->integer('installed_powers_id');
            $table->integer('power');
            $table->boolean('verified')->default(false);
            $table->timestamp('measured_at')->nullable();
            $table->timestamp('consolidated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::table('productions', function(Blueprint $table) {
            $table->foreign('source_id')
                ->references('id')
                ->on('sources')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });  
        
        Schema::table('productions', function(Blueprint $table) {
            $table->foreign('installed_powers_id')
                ->references('id')
                ->on('sources')
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
        Schema::dropIfExists('productions');
    }
}
