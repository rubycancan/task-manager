<?php

namespace App\Repositories;

use Image;
use App\Project;

class ProjectsRepository {
    public function  list() {
        return $projects = request()->user()->projects()->get();
    }

    public function create($request) {
        $request->user()->projects()->create([
            'name'=> $request->name,
            'thumbnail'=> $this->thumb($request)
        ]);
    }

    public function find($id) {
        return Project::findOrFail($id);
    }

    public function todos($project) {
        return $project->tasks()->where('completion', 0)->get();
    }

    public function dones($project) {
        return $project->tasks()->where('completion', 1)->get();
    }

    public function update($request, $id) {
        $project = $this->find($id);

        $project->name = $request->name;
        if($request->hasFile('thumbnail')) {
            $project->thumbnail = $this->thumb($request);
        }

        $project->save();
    }

    public function delete($id) {
        $project = $this->find($id);
        $project->delete();
    }

    public function thumb($request) {
//        return $request->hasFile('thumbnail') ? $request->thumbnail->store('public/thumbs') : null;
        if($request->hasFile('thumbnail')) {
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();
            $thumb->storeAs('public/thumbs/original',$name);

//            $path = storage_path('app/public/thumbs/cropped/'. $name);
//            Image::make($thumb)->resize(200, 90)->save($path);
            return $name;
        }
    }
}