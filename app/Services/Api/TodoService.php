<?php

namespace App\Services\Api;

use App\Enums\TodoStatus;
use App\Http\Requests\Api\CreateTodoRequest;
use App\Http\Requests\Api\UpdateTodoRequest;
use App\Http\Resources\Api\TodoResource;
use App\Models\Todo;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class TodoService {
    final public function index(): LengthAwarePaginator {
        return Todo::paginate();
    }

    final public function create(CreateTodoRequest $createTodoRequest): Todo {
        $data = $createTodoRequest->validated();
        $data["status"] = TodoStatus::fromName($data["status"])->value;

        return Todo::create($data);
    }

    final public function update(Todo $todo, UpdateTodoRequest $updateTodoRequest): Todo {
        $data = $updateTodoRequest->validated();

        if (Arr::exists($data, "status")) {
            $data["status"] = TodoStatus::fromName($data["status"])->value;
        }

        $todo->update($data);

        return $todo->refresh();
    }
}
