<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdentifyTrackAndTraceRequest;
use App\Http\Requests\StoreTrackAndTraceRequest;
use App\Http\Requests\UpdateTrackAndTraceRequest;
use App\Models\TrackAndTrace;
use Illuminate\Support\Facades\Auth;

class TrackAndTraceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrackAndTraceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackAndTraceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrackAndTrace  $trackAndTrace
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $trackAndTrace = TrackAndTrace::findOrFail($id);
        if (Auth::check() && Auth::user()->can('view', $trackAndTrace)) {
            return view('track_and_trace.show')
                ->with('trackAndTrace', $trackAndTrace);
        }else{
            return view('track_and_trace.identity_check')
                ->with('trackAndTrace', $trackAndTrace);
        }
    }


    public function identify($id, IdentifyTrackAndTraceRequest $request){
        $validated = $request->validated();
        $trackAndTrace = TrackAndTrace::findOrFail($id);
        return view('track_and_trace.show')
            ->with('trackAndTrace', $trackAndTrace);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrackAndTrace  $trackAndTrace
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackAndTrace $trackAndTrace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrackAndTraceRequest  $request
     * @param  \App\Models\TrackAndTrace  $trackAndTrace
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackAndTraceRequest $request, TrackAndTrace $trackAndTrace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrackAndTrace  $trackAndTrace
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackAndTrace $trackAndTrace)
    {
        //
    }

    public function addUser($id){
        $trackAndTrace = TrackAndTrace::find($id);
        $trackAndTrace->user_id = Auth::user()->id;
        $trackAndTrace->save();
        return redirect(route('track-and-trace', $trackAndTrace->id));
    }
}
