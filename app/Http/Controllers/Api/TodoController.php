<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTodoRequest;
use App\Http\Requests\Api\UpdateTodoRequest;
use App\Http\Resources\Api\TodoResource;
use App\Models\Todo;
use App\Services\Api\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoController extends Controller {
    public function __construct(private readonly TodoService $todoService) {}

    final public function index(): AnonymousResourceCollection {
        $paginatedTodo = $this->todoService->index();

        return TodoResource::collection($paginatedTodo);
    }

    final public function view(Todo $todo): TodoResource {
        return new TodoResource($todo);
    }

    final public function create(CreateTodoRequest $createTodoRequest): TodoResource {
        $todo = $this->todoService->create($createTodoRequest);

        return new TodoResource($todo);
    }

    final public function update(Todo $todo, UpdateTodoRequest $updateTodoRequest): TodoResource {
        $todo = $this->todoService->update($todo, $updateTodoRequest);

        return new TodoResource($todo);
    }

    final public function delete(Todo $todo): JsonResponse {
        $deleted = $todo->delete();

        return response()->json(compact("deleted"));
    }
}
