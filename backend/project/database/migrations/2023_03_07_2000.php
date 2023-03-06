<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::connection($this -> getConnection()) ->
            unprepared("
                SET search_path to public;
                CREATE SCHEMA kaze;
                SET search_path to kaze;
            ");
    }

    public function down(): void
    {
        DB::connection($this -> getConnection()) ->
            unprepared("
                DROP SCHEMA IF EXISTS kaze;
            ");
    }
};
