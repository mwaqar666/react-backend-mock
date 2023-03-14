<?php

namespace App\Http\Requests\Api;

use App\Enums\TodoStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateTodoRequest extends FormRequest {
    final public function rules(): array {
        $allowedTodoStatuses = implode(",", TodoStatus::names());

        return [
            "name" => ["required", "string", "min:3", "max:255"],
            "description" => ["nullable", "string", "max:3000"],
            "status" => ["nullable", "in:$allowedTodoStatuses"],
        ];
    }
}
