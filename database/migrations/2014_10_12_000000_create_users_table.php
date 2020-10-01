<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('phone', 15)->nullable();
            $table->multiLineString('office_location', 100)->nullable();
            $table->decimal('personal_address_lat', 10, 7)->nullable();
            $table->decimal('personal_address_long', 10, 7)->nullable();
            $table->string('contact_number', 10)->nullable();
            $table->float('salary', 7, 2)->nullable();
            $table->enum('status', ['current', 'past', 'inactive'])->nullable();
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('users');
    }
}
