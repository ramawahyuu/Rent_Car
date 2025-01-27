<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->string('status', 20)->change();  // Increase the length of the status column
    });
}

public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->string('status', 10)->change();  // Revert back to the original length
    });
}
};
