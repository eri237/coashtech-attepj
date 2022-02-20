<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameUserIdToJobIdOnBreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('breaks', function (Blueprint $table) {
            $table->renameColumn('user_id', 'job_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('breaks', function (Blueprint $table) {
            $table->renameColumn('job_id', 'user_id');
        });
    }
}
