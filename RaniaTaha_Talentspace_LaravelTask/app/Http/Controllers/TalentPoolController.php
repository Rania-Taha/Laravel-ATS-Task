<?php

namespace App\Http\Controllers;

use App\DataTables\TalentPoolDataTable;
use App\Models\Talent_Pool;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTalent_PoolRequest;
use App\Http\Requests\UpdateTalent_PoolRequest;

class TalentPoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TalentPoolDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Talent_Pool.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Talent_Pool.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'skills' => 'required',
        ]);

        Talent_Pool::create([
            'skills' => $validatedData['skills'],
            'candidate_id' => $request->candidate_id,
        ]);

        $notification = array(
            'message' => 'Added Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('talent_pool.index')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $talent_pool = Talent_Pool::findOrFail($id);
        $talent_pool->delete();
    
        return back()->with([
            'message' => ' Deleted Successfully!!',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talent_Pool $talent_Pool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTalent_PoolRequest $request, Talent_Pool $talent_Pool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $talent_pool = Talent_Pool::findOrFail($id);
        $talent_pool->delete();
    
        return back()->with([
            'message' => ' Deleted Successfully!!',
            'alert-type' => 'success',
        ]);
    }
}
