<?php

namespace App\Http\Service;

use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\SearchTaskRequest;

class TaskService
{
    /**
     * @return Collection
     */
    public function readTask(): Collection
    {
        return Task::orderBy('status', 'asc')->orderBy('limit', 'asc')->get();
    }

    /**
     * @param TaskRequest $request
     */
    public function addTask(TaskRequest $request): void
    {
        Task::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'limit' => $request->limit,
            'status' => TASK::STATUS_NOT_END,
        ]);
    }

    /**
     * @param int $task_id
     * @return Task
     */
    public function editTask(int $task_id): Task
    {
        return Task::find($task_id);
    }

    /**
     * @param TaskRequest $request
     * @param int $task_id
     */
    public function updateTask(TaskRequest $request, int $task_id): void
    {
        Task::where('task_id', $task_id)
            ->update([
                'name' => $request->name,
                'detail' => $request->detail,
                'limit' => $request->limit,
                'status' => $request->status,
            ]);
    }

    /**
     * @param int $task_id
     */
    public function changeStatus(int $task_id): void
    {
        Task::where('task_id', $task_id)
            ->update(['status' => TASK::STATUS_END]);
    }

    /**
     * @param int $task_id
     */
    public function deleteTask(int $task_id): void
    {
        Task::where('task_id', $task_id)
            ->delete();
    }

    /**
     * @param SearchTaskRequest $request
     * @return Collection
     */
    public function searchTask(SearchTaskRequest $request): Collection
    {
        return Task::where('name', 'LIKE', "%{$request->name}%")->orderBy('status', 'asc')->orderBy('limit', 'asc')->get();
    }
}

