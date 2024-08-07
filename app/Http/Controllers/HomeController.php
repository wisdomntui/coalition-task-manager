<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->getTasks($request);
        } else {
            // Fetch projects
            $projects = Project::get()->pluck('title', 'id')->toArray();

            return view('pages.home', compact('projects'));
        }
    }

    /**
     * Return datatable records
     * 
     * @param Request $request
     */
    public function getTasks(Request $request)
    {
        if (!empty($request->get('project'))) {
            $model = Task::where('project_id', $request->project)->with('project');
        } else {
            $model = Task::with('project');
        }

        return DataTables::eloquent($model)->addColumn('project', function (Task $task) {
            return $task->project->title;
        })->addColumn('action', function ($row) {

            $btn = '';
            $btn = $btn . '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" data-id="' . $row->id . '" data-name="' . $row->name . '" data-priority="' . $row->priority . '" data-description="' . $row->description . '" data-project="' . $row->project->id . '" id="">Edit</a>';
            $btn = $btn . '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-id="' . $row->id . '">Delete</a>';

            return $btn;
        })->toJson();
    }
}
