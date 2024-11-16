<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Em vez de criar a tabela, vamos modificá-la
        Schema::table('users', function (Blueprint $table) {
            // Adicione aqui apenas os campos que ainda não existem
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->unique();
            }
            if (!Schema::hasColumn('users', 'password')) {
                $table->string('password');
            }
            // Adicione outros campos necessários
        });
    }

    public function down()
    {
        // Remove os campos adicionados
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'password']);
            // Adicione outros campos que precisam ser removidos
        });
    }
}; 