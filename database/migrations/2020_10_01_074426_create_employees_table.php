<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('phone', 15);
            $table->multiLineString('office_location', 100);
            $table->decimal('personal_address_lat', 10, 7);
            $table->decimal('personal_address_long', 10, 7);
            $table->string('contact_number', 10);
            $table->float('salary', 7, 2);
            $table->enum('status', ['current', 'past', 'inactive']);
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
        Schema::dropIfExists('employees');
    }
}
