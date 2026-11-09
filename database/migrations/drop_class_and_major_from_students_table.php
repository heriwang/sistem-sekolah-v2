<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $columnsToDrop = [];

            if (Schema::hasColumn('students', 'major')) {
                $columnsToDrop[] = 'major';
            }
            if (Schema::hasColumn('students', 'class')) {
                $columnsToDrop[] = 'class';
            }

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'major')) {
                $table->string('major')->after('gender');
            }
            if (!Schema::hasColumn('students', 'class')) {
                $table->string('class')->after('major');
            }
        });
    }
};