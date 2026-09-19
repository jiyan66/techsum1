<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    protected $helpers = ['url'];

    public function welcome()
    {
        $taskModel = new TaskModel();

        $data = [
            'pageTitle' => 'Welcome',
            'tasks' => $taskModel
                ->where('task_date', date('Y-m-d'))
                ->orderBy('id', 'ASC')
                ->findAll()
        ];

        return view('welcome', $data);
    }

    public function tasks()
    {
        $taskModel = new TaskModel();

        $data = [
            'pageTitle' => 'Task List',
            'tasks' => $taskModel
                ->orderBy('task_date', 'ASC')
                ->orderBy('id', 'ASC')
                ->findAll()
        ];

        return view('tasks', $data);
    }

    public function profile()
    {
        $userModel = new UserModel();

        $data = [
            'pageTitle' => 'Profile',
            'user' => $userModel->first()
        ];

        return view('profile', $data);
    }

    public function about()
    {
        $data = [
            'pageTitle' => 'About',
            'developerName' => 'Joseph Gian Carlo Mistica'
        ];

        return view('about', $data);
    }
}