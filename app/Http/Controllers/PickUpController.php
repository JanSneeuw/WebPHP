<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePickupRequest;
use App\Http\Requests\StorePickUpRequest;
use App\Http\Requests\UpdatePickUpRequest;
use App\Models\Depot;
use App\Models\Package;
use App\Models\PickUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PickUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        if (!empty($filter)){
            $packages = Package::sortable()
                ->where('name', 'like', '%'.$filter.'%')
                ->where('pick_up_id', null)
                ->paginate(10);

        }else{
            $packages = Package::sortable()
                ->where('pick_up_id', null)
                ->paginate(10);
        }
        return view('panel/pickup/plan')
            ->with('packages', $packages)
            ->with('filter', $filter);
    }

    public function planned() {
        $pickups = PickUp::sortable()
            ->where('picked_up', false)
            ->paginate(10);
        return view('panel/pickup/planned')
            ->with('pickups', $pickups);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(CreatePickupRequest $request)
    {
        $validate = $request->validated();
        return view('panel/pickup/plan_date')
            ->with('packages', $request->packages)
            ->with('depots', Depot::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePickUpRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(StorePickUpRequest $request)
    {
        $validated = $request->validated();
        $pickup = PickUp::create([
            'depot_id' => $request->depot_id,
            'planned_pickup_date' => $request->date,
        ]);
        foreach ($request->packages as $package_id){
            $package = Package::find($package_id);
            $pickup->packages()->save($package);
        }
        return view('panel/pickup/success')
            ->with('pickup', $pickup);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {

        $pickup = PickUp::find($id);
        if (Auth::user()->cannot('view', $pickup)){
            abort(403);
        }
        return view('panel/pickup/show')
            ->with('pickup', $pickup);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Http\Response
     */
    public function edit(PickUp $pickUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePickUpRequest  $request
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePickUpRequest $request, PickUp $pickUp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickUp $pickUp)
    {
        //
    }

    public function pickUp(UpdatePickUpRequest $request){
        $validated = $request->validated();
        $pickup = PickUp::find($request->id);
        $pickup->picked_up = true;
        $pickup->save();
        return redirect()->route('planned_pickups');
    }
}
