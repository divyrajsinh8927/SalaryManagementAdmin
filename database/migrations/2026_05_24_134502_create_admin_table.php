<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('login_token')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->enum('role', ['admin', 'sub_admin'])->default('sub_admin');
            $table->boolean('is_active')->default(true);
            $table->string('reset_password_token')->nullable();
            $table->timestamp('reset_password_token_expiry')->nullable();
            $table->boolean('is_delete')->default(false);
            $table->string('deleted_by')->nullable();
            $table->string('deleted_by_uid')->nullable();
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('updated_date')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_admin');
    }
};
