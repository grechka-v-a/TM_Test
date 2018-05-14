<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    
    private $the_task;

    public function __construct()
    {
        $this->the_task = new Task();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = $this->the_task->all();

        return view('tasks.index', compact('tasks'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function create()
    {

        return view('tasks.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'status' => 'required|integer',
        ]);

        $this->the_task->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'assigned_to' => $request->input('assigned_to'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'status' => $request->input('status'),
        ]);

        return redirect('/');

    }


    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Task $task)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Task $task)
    {
        $check_1 = '';
        $check_2 = '';
        $check_3 = '';

        switch ($task->status) {
            case 1:
                $check_1 = 'checked';
                break;
            case 2:
                $check_2 = 'checked';
                break;
            case 3:
                $check_3 = 'checked';
                break;
            default;
        }
        return view('tasks.edit', compact(['task', 'check_1', 'check_2', 'check_3']));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'status' => 'required|integer',
        ]);

        $task = $this->the_task->find($id);

        $task->timestamps = false;
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->assigned_to = $request->input('assigned_to');
        $task->start_time = $request->input('start_time');
        $task->end_time = $request->input('end_time');
        $task->status = $request->input('status');

        $task->save();

        return redirect('/');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $task = $this->the_task->find($id);

        $task->delete();

        return redirect('/');

    }
}
