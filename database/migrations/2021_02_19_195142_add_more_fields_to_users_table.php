<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('organization');
            $table->string('street');
            $table->string('city');
            $table->string('phone_number')->unique();
            $table->string('license_key')->nullable($value = true);
            $table->timestamp('expire_date')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('organization');
            $table->dropColumn('street');
            $table->dropColumn('city');
            $table->dropColumn('phone_number');
            $table->dropColumn('license_key');
            $table->dropColumn('expire_date');
        });
    }
}
