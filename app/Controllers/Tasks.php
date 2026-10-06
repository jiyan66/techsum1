<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    // Public list dashboard view
    public function index()
    {
        $data['tasks'] = $this->taskModel->getActiveTasks(); // Pulls non-archived tasks only
        return view('tasks', $data);
    }

    // Protected view: Create layout
    public function new()
    {
        return view('tasks/create');
    }

    // Process creation submittal
    public function create()
    {
        $rules = [
            'title'     => 'required|min_length[3]',
            'task_date' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'status'      => 'Pending',
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks')->with('success', 'Task recorded successfully.');
    }

    // Protected view: Edit layout
    public function edit($id)
    {
        $data['task'] = $this->taskModel->find($id);

        if (!$data['task'] || $data['task']['is_archived'] == 1) {
            return redirect()->to('/tasks')->with('error', 'Requested active database record does not exist.');
        }

        return view('tasks/edit', $data);
    }

    // Process updates
    public function update($id)
    {
        $rules = [
            'title'     => 'required|min_length[3]',
            'task_date' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/tasks')->with('success', 'Task properties successfully adjusted.');
    }

    // Soft deletion action handler
    public function delete($id)
    {
        // Flips the archival flag matrix state instead of dropping database entries entirely
        $this->taskModel->update($id, ['is_archived' => 1]);
        return redirect()->to('/tasks')->with('success', 'Record securely moved to systems structural storage archive.');
    }
}
