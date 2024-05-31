<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\project;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            return view('admin.projects.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
         $validated = $request->validate(
             [
                 'name' => 'required|min:5|max:150|unique:projects,name',
                 'summary' => 'nullable|min:10',
                 'client_name' => 'min:3|max:10'
             ]
         );


        $formData = $request->all();
        $newProject = new project();
        $newProject->fill($formData);
        $newProject->slug = Str::slug($newProject->name, '-');
        $newProject->save();

        return redirect()->route('admin.projects.show', ['project' => $newProject->id]);

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $validated = $request->validate(
            [
                'name' => [
                    'required',
                    'min:5',
                    'max:150',
                    Rule::unique('projects')->ignore($project)
                ],
                'summary' => 'min:10|max:11'
            ]
        );


        $formData = $request->all();
        $project->slug = Str::slug($formData['name'], '-');
        $project->update($formData);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
