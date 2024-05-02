<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Mail\SendProject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        // Eager load user relationship to minimize queries
        $projects = Project::with('user')->get();
        return view('welcome', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'description' => 'required',
            'project_image' => 'required|image',
            'project_file' => 'required|file',
        ]);

        // Process project image
        $imageName = null;
        if ($request->hasFile('project_image')) {
            $imageName = $request->file('project_image')->store('public/project_images');
            $imageName = basename($imageName);
        }

        // Process project file
        $fileName = null;
        if ($request->hasFile('project_file')) {
            // $fileName = $request->file('project_file')->store('public/project_files');
            $originalFileName = $request->file('project_file')->getClientOriginalName();
$fileName = $request->file('project_file')->storeAs('public/project_files', $originalFileName, 'local');

            $fileName = basename($fileName);
        }

        // Project::create([
        //     'name' => $request->input('project_name'),
        //     'user_id' => Auth::id(),
        //     'description' => $request->input('description'),
        //     'image' => $imageName,
        //     'file' => $fileName,
        // ]);
        $data = new Project();
        $data->name=$request->input('project_name');
        $data->user_id=Auth::id();
        $data->description=$request->input('description');
        $data->image=$imageName;
        $data->file=$fileName;
        $data->save();

        return redirect('dashboard')->with('success', 'Project uploaded successfully.');
    }

    /**
     * Send project request email.
     */
    public function project_request(Request $request)
    {

        ini_set("max_execution_time", -1);

        $data = Project::with('user')->findOrFail($request->project_id);
        $projectName = $data->name;
        // $projectFile =$data->name;
        // $projectFilePath = storage_path('app/public/project_files/' . $data->file);
        $projectFilePath = url('storage/project_files/' . $data->file);
        // $projectFilePath = url('public/storage/project_files/' . $data->file);

// dd($fileExists); // Should return true if the file exists
// $projectFilePath = storage_path( $data->file);


        // dd($projectFilePath);
        Mail::to($request->emailAddress)->send(new SendProject($projectName, $projectFilePath));

        return redirect('/')->with('success', 'Download link has been sent to your email.');
    }

    // Implement other methods as needed...

    /**
     * Display the dashboard with user's projects.
     */
    public function dashboard()
    {
        $projects = auth()->user()->projects;
        return view('dashboard', compact('projects'));
    }
}
