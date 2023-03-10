<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTodoRequest;
use App\Http\Requests\Api\UpdateTodoRequest;
use App\Http\Resources\Api\TodoResource;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoController extends Controller {
    final public function index(): AnonymousResourceCollection {
        $paginatedTodo = Todo::paginate();

        return TodoResource::collection($paginatedTodo);
    }

    final public function view(Todo $todo): TodoResource {
        return new TodoResource($todo);
    }

    final public function create(CreateTodoRequest $createTodoRequest): TodoResource {
        $todo = Todo::create($createTodoRequest->validated());

        return new TodoResource($todo);
    }

    final public function update(Todo $todo, UpdateTodoRequest $updateTodoRequest): TodoResource {
        $todo->update($updateTodoRequest->validated());

        return new TodoResource($todo->refresh());
    }

    final public function delete(Todo $todo): JsonResponse {
        $deleted = $todo->delete();

        return response()->json(compact("deleted"));
    }
}
