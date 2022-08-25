<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\JobRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploading;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class JobController extends Controller
{
    use MediaUploading;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Media $mediaItem)
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (auth()->user()->isStudent()) {
            $jobs = Job::where('student_id', auth()->id())->paginate(5);
        } else {
            $jobs = Job::whereNull('teacher_id')->paginate(5);
        }

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        // dd($request->all());
        // $job = Job::create($request->validated() + ['student_id' => auth()->id()]);

        // foreach ($request->input('attachments', []) as $file) {
        //     $job->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        // }
        $job=new Job();
        $job->student_id=Auth::user()->id;
        $job->teacher_id=null;
        $job->title=$request->title;
        $job->description=$request->description;
        $job->budget=$request->budget;
        $job->delivery_date=$request->delivery_date;
        $job->hired_at=$request->hired_at;
        foreach ($request->input('attachments', []) as $file) {
                $job->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }
        $job->save();


        return redirect()->route('admin.jobs.index')->with([
            'message' => 'success created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        if ($job->student_id != auth()->id()) {
            abort(404);
        }

        $job->load(['student', 'teacher', 'proposals']);

        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Job $job)
    {
        if ($job->student_id != auth()->id()) {
            abort(404);
        }
        
        $job->update($request->all());

        if (isset($request->teacher_id)) {
            Proposal::where('job_id', $job->id)->where('teacher_id', $request->teacher_id)
                ->update(['approved_at' => now()]);
            Proposal::where('job_id', $job->id)->where('teacher_id', '!=', $request->teacher_id)
                ->update(['rejected_at' => now()]);
        }

        return redirect()->route('admin.jobs.index')->with([
            'message' => 'success updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job=Job::find($id);
        $job->delete();

        return back()->with([
            'message' => 'success deleted !',
            'alert-type' => 'danger'
        ]);;
    }

    public function downloadMedia(Media $mediaItem)
    {
        return $mediaItem;
    }
}
