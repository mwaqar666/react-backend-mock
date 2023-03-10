<?php

use App\Enums\TodoStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    final public function up(): void {
        Schema::create("todo", static function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description")->nullable();
            $table->unsignedTinyInteger("status")->default(TodoStatus::PENDING->value);
            $table->timestamps();
        });
    }

    final public function down(): void {
        Schema::dropIfExists("todo");
    }
};
