<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user');
			$table->string('name');
            $table->string('gender')->nullable();
			$table->string('info')->nullable();
            $table->string('owner');
            $table->string('owner_info');
			$table->string('url');
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_master');
    }
}
