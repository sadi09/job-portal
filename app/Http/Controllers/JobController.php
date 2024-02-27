<?php

namespace App\Http\Controllers;

use App\Helper\JwtToken;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = JwtToken::VerifyToken($request->cookie('token'))->id;
        $jobs = Job::where('employer_id', $id)->get();

        return view('pages.employer.jobs.job-list', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $categories = JobCategory::get();

        return view('pages.employer.jobs.new-job', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'vacancy' => 'required|integer|min:1',
            'type' => 'required|in:full time,part time,contractual,internship',
            'job_categories_id' => 'required|exists:job_categories,id',
            'location' => 'required|string|max:255',
            'salary_lower_limit' => 'required|numeric|min:0',
            'salary_upper_limit' => 'required|numeric|gt:salary_lower_limit',
            'deadline' => 'required|date',
            'description' => 'required|string',
            'experience_requirements' => 'required|integer|min:0',
            'education_requirements' => 'required|string|max:255',
            'skills_and_qualifications' => 'required|string',
            'application_instructions' => 'required|string',
            'contact_information' => 'required|string|max:255',
            'isRemote' => 'required|in:0,1',
        ]);
        $status = 'draft';
        if ($request->has('publish')) {
            $status = 'published';
        }
        $id = JwtToken::VerifyToken($request->cookie('token'))->id;

        $new_job = Job::create([
            'title' => $request->input('title'),
            'vacancy' => $request->input('vacancy'),
            'type' => $request->input('type'),
            'job_categories_id' => $request->input('job_categories_id'),
            'location' => $request->input('location'),
            'salary_lower_limit' => $request->input('salary_lower_limit'),
            'salary_upper_limit' => $request->input('salary_upper_limit'),
            'deadline' => $request->input('deadline'),
            'description' => $request->input('description'),
            'experience_requirements' => $request->input('experience_requirements'),
            'education_requirements' => $request->input('education_requirements'),
            'skills_and_qualifications' => $request->input('skills_and_qualifications'),
            'application_instructions' => $request->input('application_instructions'),
            'contact_information' => $request->input('contact_information'),
            'isRemote' => $request->input('isRemote'),
            'employer_id' => $id,
            'status' => $status,

        ]);

        if ($validator->fails()) {
            return redirect(route('post-job'))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->has('draft')) {
            // Save as draft logic
            return redirect()
                ->route('jobs.edit', $new_job->id)
                ->with('success', 'Job saved as draft.');
        } else {
            // Save and publish logic
            return redirect(route('jobs-list'))->with('success', 'Job published successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::find($id);
        $categories = JobCategory::get();

        return view('pages.employer.jobs.view-job', compact('categories', 'job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);
        $categories = JobCategory::get();

        return view('pages.employer.jobs.edit-job', compact('categories', 'job'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'vacancy' => 'required|integer|min:1',
            'type' => 'required|in:full time,part time,contractual,internship',
            'job_categories_id' => 'required|exists:job_categories,id',
            'location' => 'required|string|max:255',
            'salary_lower_limit' => 'required|numeric|min:0',
            'salary_upper_limit' => 'required|numeric|gt:salary_lower_limit',
            'deadline' => 'required|date',
            'description' => 'required|string',
            'experience_requirements' => 'required|integer|min:0',
            'education_requirements' => 'required|string|max:255',
            'skills_and_qualifications' => 'required|string',
            'application_instructions' => 'required|string',
            'contact_information' => 'required|string|max:255',
            'isRemote' => 'required|in:0,1',
        ]);

        $new_job = Job::find($id)->update([
            'title' => $request->input('title'),
            'vacancy' => $request->input('vacancy'),
            'type' => $request->input('type'),
            'job_categories_id' => $request->input('job_categories_id'),
            'location' => $request->input('location'),
            'salary_lower_limit' => $request->input('salary_lower_limit'),
            'salary_upper_limit' => $request->input('salary_upper_limit'),
            'deadline' => $request->input('deadline'),
            'description' => $request->input('description'),
            'experience_requirements' => $request->input('experience_requirements'),
            'education_requirements' => $request->input('education_requirements'),
            'skills_and_qualifications' => $request->input('skills_and_qualifications'),
            'application_instructions' => $request->input('application_instructions'),
            'contact_information' => $request->input('contact_information'),
            'isRemote' => $request->input('isRemote')
        ]);

        return redirect(route('jobs.edit', $id))->with('success', 'Job description updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
