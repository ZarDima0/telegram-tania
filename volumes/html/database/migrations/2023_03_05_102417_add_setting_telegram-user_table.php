<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('telegram_user', function (Blueprint $table) {
            $table->boolean('is_image_send')->default(true);
            $table->boolean('is_poetry_send')->default(true);
            $table->time('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('telegram_user', function (Blueprint $table) {
            $table->dropColumn('is_image_send');
            $table->dropColumn('is_poetry_send');
            $table->dropColumn('time');
        });
    }
};
