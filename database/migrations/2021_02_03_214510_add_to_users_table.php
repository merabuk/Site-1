<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('id');
            $table->string('patronymic')->after('name')->nullable();
            $table->string('phone')->after('email_verified_at')->nullable();
            $table->string('city')->after('phone')->nullable();
            $table->string('address')->after('city')->nullable();
            $table->unsignedBigInteger('manager_id')->after('address')->nullable();
            $table->string('api_token', 80)->after('password')->unique()->nullable()->default(null);

            $table->foreign('manager_id')->references('id')->on('users')->onDelete('set null');
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
            $table->dropForeign('users_manager_id_foreign');
            $table->dropColumn(['surname', 'patronymic', 'phone', 'city', 'address', 'manager_id', 'api_token']);
        });
    }
}
