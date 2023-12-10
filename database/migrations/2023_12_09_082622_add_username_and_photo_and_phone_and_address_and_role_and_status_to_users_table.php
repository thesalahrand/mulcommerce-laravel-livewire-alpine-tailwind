<?php

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('password', function (Blueprint $table) {
                $table->string('username')->unique();
                $table->string('photo')->nullable();
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->enum('role', array_column(UserRole::cases(), 'value'))->default('user');
                $table->enum('status', array_column(UserStatus::cases(), 'value'))->default('active');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'photo', 'phone', 'address', 'role', 'status']);
        });
    }
};
