<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            // $table->enum('status', ['pending', 'in-progress', 'delivered'])
            //     ->default('pending')
            //     ->change();
            DB::statement("ALTER TABLE `deliveries`
                CHANGE COLUMN `status` `status` ENUM('pending','in-progress','delivered') NOT NULL DEFAULT 'pending'
            ");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            // $table->enum('status', ['in-progress', 'delivered'])
            //     ->default('in-progress')
            //     ->change();
            DB::statement("ALTER TABLE `deliveries`
                CHANGE COLUMN `status` `status` ENUM('in-progress','delivered') NOT NULL DEFAULT 'in-progress'
            ");
        });
    }
};
