<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Service\TaskService;
use App\Http\Requests\SearchTaskRequest;

class TaskController extends Controller
{
    private $taskService;

    const UPDATE_MESSAGE = '更新が完了しました';

    const DELETE_MESSAGE = '削除が完了しました';

    const SEARCH_MESSAGE = '検索したタスクはありませんでした';

    /**
     * TaskController constructor.
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = $this->taskService->readTask();

        return view('todo.index', compact('tasks'));
    }

    /**
     * @param TaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(TaskRequest $request)
    {
        $this->taskService->addTask($request);

        return redirect()->route('todo');
    }

    /**
     * @param int $task_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $task_id)
    {
        $editTask = $this->taskService->editTask($task_id);

        return view('todo.edit', compact('editTask'));
    }

    /**
     * @param TaskRequest $request
     * @param int $task_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, int $task_id)
    {
        $this->taskService->updateTask($request, $task_id);

        return redirect()->route('todo')->with('message', self::UPDATE_MESSAGE);
    }

    /**
     * @param int $task_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change(int $task_id)
    {
        $this->taskService->changeStatus($task_id);

        return redirect()->route('todo')->with('message', self::UPDATE_MESSAGE);
    }

    /**
     * @param int $task_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $task_id)
    {
        $this->taskService->deleteTask($task_id);

        return redirect()->route('todo')->with('message', self::DELETE_MESSAGE);
    }

    /**
     * @param SearchTaskRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(SearchTaskRequest $request)
    {
        $searchTasks = $this->taskService->searchTask($request);
        if ($searchTasks->isEmpty()) {
            return redirect()->route('todo')->with('message', self::SEARCH_MESSAGE);
        } else {
            return view('todo.search', compact('searchTasks'));
        }
    }
}
