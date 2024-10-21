<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In the migration file (timestamp_add_is_favorite_to_rooms_table.php)
public function up()
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->boolean('is_favorite')->default(false);
    });
}

public function down()
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->dropColumn('is_favorite');
    });
}

};
