<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectsApiController extends Controller
{
    public function getProject()
    {
        $project = Project::all();
        return response()->json($project);
    }
}
