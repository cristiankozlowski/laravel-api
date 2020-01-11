<?php

namespace App\Http\Controllers\Api;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with('company')->get();
        return response()->json($jobs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->fill($request->all());
        $job->save();

        return response()->json($job, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::with('company')->find($id);

        if(!$job) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return response()->json($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        if(!$job) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        $job->fill($request->all());
        $job->save();

        return response()->json($job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);

        if(!$job) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        $job->delete();
    }
}
