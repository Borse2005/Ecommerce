<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFeildsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->unique()->nullable()->after('email');
            $table->string('alternatephone')->after('phone')->nullable();
            $table->text('address')->after('alternatephone')->nullable();
            $table->string('district')->after('address')->nullable();
            $table->string('state')->after('district')->nullable();
            $table->string('pincode')->after('state')->nullable();
            $table->bigInteger('order')->after('pincode')->nullable();
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
            $table->dropColumn(['phone', 'alternatephone', 'address', 'district', 'state', 'pincode', 'order']);
        });
    }
}
