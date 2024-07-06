<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Create new project
     * 
     * @param ProjectRequest $request - Request object of type Project
     */
    public function create(CreateProjectRequest $request)
    {
        // Get validated request data
        $data = $request->validated();

        try {
            // Create new record
            $project = new Project();
            $project->title = $data['title'];
            $project->save();

            return response()->json(['status' => true, 'message' => 'Project created successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Error creating project!']);
        }
    }
}
