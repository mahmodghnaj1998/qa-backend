<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQusetionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qusetions', function (Blueprint $table) {
            $table->id();
            $table->string("qusetion");
            $table->string("slug");
             $table->mediumText('conect');          
            $table->integer("user_id");
            $table->integer("language_id");
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
        Schema::dropIfExists('qusetions');
    }
}
