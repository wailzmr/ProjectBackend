<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('contact_message_replies', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_message_replies', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('contact_message_id')->constrained()->nullOnDelete();
            }
            if (!Schema::hasColumn('contact_message_replies', 'is_admin')) {
                $table->boolean('is_admin')->default(false)->after('user_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('contact_message_replies', function (Blueprint $table) {
            if (Schema::hasColumn('contact_message_replies', 'is_admin')) {
                $table->dropColumn('is_admin');
            }
            if (Schema::hasColumn('contact_message_replies', 'user_id')) {
                $table->dropConstrainedForeignId('user_id');
            }
        });
    }
};

