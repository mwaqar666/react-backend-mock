<?php

namespace App\Models;

use App\Enums\TodoStatus;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    protected $table = "todo";
    protected $fillable = ["name", "description", "status"];
    protected $casts = [
        "status" => TodoStatus::class
    ];
}
