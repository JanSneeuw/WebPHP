<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;
use App\Models\Package;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::sortable()->paginate(25);

        return view('panel.labels.index', compact('labels'));
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
     * @param  \App\Http\Requests\StoreLabelRequest  $request
     *
     */
    public function createLabels(StoreLabelRequest $request)
    {

        $labels = [];
        foreach ($request->packages as $package_id) {
            $package = Package::find($package_id);
            $label = Label::firstOrCreate(['package_id' => $package_id],
                [
                    'package_id' => $package_id,
                    'receiver_name' => $package->receiver_name,
                    'address_id' => $package->address_id,
                ]);
            $label->qrcode_link = 'localhost:8000/labels/' . $label->id;
            $label->save();
            $labels[] = $label;
        }

        return view('panel.labels.show')
            ->with('labels', $this->labelPaginate($labels, 1, null, ['path' => $request->getRequestUri()]));
    }

    public function downloadLabel(Request $request){
        $labels = Label::findMany([$request->label_id]);
        return $this->getPDF($labels);
    }

    public function downloadBulkLabels(Request $request){
        $labels = Label::findMany($request->labels);
        return $this->getPDF($labels);
    }

    public function getPDF($labels){
        view()->share('labels', $labels);
        $pdf = PDF::loadView('panel.labels.pdf', ['labels' => $labels])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('labels.pdf');
    }

    public function labelPaginate($items, $perPage = 1, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLabelRequest  $request
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabelRequest $request, Label $label)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        //
    }
}
