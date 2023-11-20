<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\DataTables\CandidateDataTable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCandidateRequest;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CandidateDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Candidates.index');
    }

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Candidates.create');
    }

    public function addToTalentPool($id)
    {
        $candidate = Candidate::where('id', $id)->first(); // Assuming 'id' is the column name for candidate ID
        $candidate_id = $id;
        return view('Dashboard.Candidates.addToTalentPool', compact('candidate_id', 'candidate'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'resume' => 'required|mimes:pdf',
        'cover_letter' => 'required|mimes:pdf',
        'linkedin_profile' => 'nullable|url',
    ]);

    $resume = null;
    $cover_letter = null;

    if ($request->hasFile('resume')) {
        $resume = $request->getSchemeAndHttpHost() . '/Backend/Resumes/' . time() . '.' . $request->resume->extension();
        $request->resume->move(public_path('/Backend/Resumes/'), $resume);
    }
    if ($request->hasFile('cover_letter')) {
        $cover_letter = $request->getSchemeAndHttpHost() . '/Backend/Cover_letters/' . time() . '.' . $request->cover_letter->extension();
        $request->cover_letter->move(public_path('/Backend/Cover_letters/'), $cover_letter);
    }

    Candidate::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'resume' => $resume,
        'cover_letter' => $cover_letter,
        'linkedin_profile' => $validatedData['linkedin_profile'],
    ]);

    $notification = array(
        'message' => 'Candidate Created Successfully!!',
        'alert-type' => 'success',
    );

    return redirect()->route('candidates.index')->with($notification);
}

 
public function application_store(Request $request)
{
    // Validate incoming requests
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'resume' => 'required|mimes:pdf',
        'cover_letter' => 'required|mimes:pdf',
        'linkedin_profile' => 'nullable|url',
    ]);

    $resume = null;
    $cover_letter = null;

    if ($request->hasFile('resume')) {
        $resume = $request->getSchemeAndHttpHost() . '/Backend/Resumes/' . time() . '.' . $request->resume->extension();
        $request->resume->move(public_path('/Backend/Resumes/'), $resume);
    }
    if ($request->hasFile('cover_letter')) {
        $cover_letter = $request->getSchemeAndHttpHost() . '/Backend/Cover_letters/' . time() . '.' . $request->cover_letter->extension();
        $request->cover_letter->move(public_path('/Backend/Cover_letters/'), $cover_letter);
    }

    Candidate::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'resume' => $resume,
        'cover_letter' => $cover_letter,
        'linkedin_profile' => $validatedData['linkedin_profile'],
    ]);

    return redirect()->back()->with('success', 'Thank you for applying, we will get back to you shortly');
}
    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $candidate = Candidate::findOrFail($id);
    $candidate->delete();

    return back()->with([
        'message' => 'Candidate Deleted Successfully!!',
        'alert-type' => 'success',
    ]);
}

    
   
}
