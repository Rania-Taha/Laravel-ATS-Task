<?php

namespace App\Http\Controllers;

use App\Models\Job_Post;
use App\DataTables\Job_PostDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJob_PostRequest;
use App\Http\Requests\UpdateJob_PostRequest;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Job_PostDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Job_Posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Job_Posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:100'],
            'job_type' => ['required', 'string', 'max:100'],
            'deadline' => ['required', 'date'],
            'responsibility' => ['required', 'string', 'max:1000'],
            'qualifications' => ['required', 'string', 'max:1000'],
            'job_description' => ['required', 'string', 'max:1000'],

        ]);
    

        Job_Post::create([
            'title' => $validatedData['title'],
            'location' => $validatedData['location'],
            'job_type' => $validatedData['job_type'],
            'deadline' => $validatedData['deadline'],
            'responsibility' => $validatedData['responsibility'],
            'qualifications' => $validatedData['qualifications'],
            'job_description' => $validatedData['job_description'],

        ]);
    
        $notification = array(
            'message' => 'Candidate Created Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('job_posts.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
   

     public function showAllJobs()
     {
         $job_posts = Job_Post::all(); 
         return view('index', compact('job_posts')); 
     }

    public function showJob($id)
    {
        $job = Job_Post::findOrFail($id); 
        return view('Frontend.job_details', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job_post = Job_Post::findOrFail($id);
        return view('Dashboard.Job_Posts.edit', compact('job_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:100'],
            'job_type' => ['required', 'string', 'max:100'],
            'deadline' => ['required', 'date'],
            'responsibility' => ['required', 'string', 'max:1000'],
            'qualifications' => ['required', 'string', 'max:1000'],
            'job_description' => ['required', 'string', 'max:1000'],

        ]);

            $job_post = Job_Post::findOrFail($id);

            $job_post->title = $request->title;
            $job_post->location = $request->location;
            $job_post->job_type = $request->job_type;
            $job_post->deadline = $request->deadline;
            $job_post->responsibility = $request->responsibility;
            $job_post->qualifications = $request->qualifications;
            $job_post->job_description = $request->job_description;

            $job_post->save();

    
        $notification = array(
            'message' => 'Job Post Editted Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('job_posts.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
  
    public function destroy($id)
    {
        $job_post = Job_Post::findOrFail($id);
        $job_post->delete();
    
        return back()->with([
            'message' => 'Job Post Deleted Successfully!!',
            'alert-type' => 'success',
        ]);
    }
}
