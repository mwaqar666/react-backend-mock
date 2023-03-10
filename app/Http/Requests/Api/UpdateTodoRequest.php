<?php

namespace App\Http\Requests\Api;

use App\Enums\TodoStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateTodoRequest extends FormRequest {
    final public function rules(): array {
        return [
            "name" => ["required", "string", "min:3", "max:255"],
            "description" => ["nullable", "string", "max:3000"],
            "status" => ["nullable", new Enum(TodoStatus::class)],
        ];
    }
}
