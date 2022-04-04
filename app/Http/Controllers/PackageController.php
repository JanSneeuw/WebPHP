<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Resources\PackageResource;
use App\Imports\PackageImport;
use App\Models\Address;
use App\Models\Carrier;
use App\Models\Package;
use App\Models\PickUp;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PackageController extends BaseController
{
    public function index() {
        $packages = Package::all();
        $packages->load('carrier', 'address');
        return $this->sendResponse(PackageResource::collection($packages), 'Packages retrieved successfully.');
    }

    public function store(StorePackageRequest $request){
        $input = $request->all();
        $validated = $request->validated();

        $address = Address::firstOrCreate(['street' => $input['street'], 'city' => $input['city'], 'state' => $input['state'], 'zip' => $input['zip']]);
        $carrier = Carrier::firstOrCreate(['name' => $input['carrier_name']]);

        $package = Package::create($input);
        $package->address_id = $address->id;
        $package->carrier_id = $carrier->id;
        $package->save();
        return $this->sendResponse(new PackageResource($package), 'Package created successfully.');
    }

    public function show($id){
        $package = Package::find($id);
        if (is_null($package)) {
            return $this->sendError('Package not found.');
        }
        return $this->sendResponse(new PackageResource($package), 'Package retrieved successfully.');
    }

    public function update(Request $request, Package $package){
        $input = $request->all();
        $validator = Validator::make($input, [
            'status' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $package->status = $input['status'];
        $package->save();
        return $this->sendResponse(new PackageResource($package), 'Package updated successfully.');
    }

    public function destroy(Package $package){
        $package->delete();
        return $this->sendResponse([], 'Package deleted successfully.');
    }

    public function importIndex(Request $request){
        if ($request->user()->cannot('create', Package::class)) {
            return abort(401);
        }
        return view('panel.packages.import');
    }

    public function import(Request $request){
        if ($request->user()->cannot('create', Package::class)) {
            return abort(401);
        }
        Excel::import(new PackageImport, request()->file('file')->store('temp'));
        return back();
    }

    public function indexPage(Request $request){
        if ($request->user()->cannot('viewAny', Package::class)) {
            return abort(401);
        }
        $filter = $request->query('filter');
        if (!empty($filter)){
            $packages = Package::sortable()
                ->where('name', 'like', '%'.$filter.'%')
                ->paginate(10);
        }else{
            $packages = Package::sortable()->paginate(10);
        }
        return view('panel.packages.index')
            ->with('packages', $packages)
            ->with('filter', $filter);
    }

    public function showPackage(Request $request){
        $package = $this->show($request->id);
        if ($request->user()->cannot('view', $package->getData()->data)) {
            return abort(401);
        }
        return view('panel.packages.show')
            ->with('package', $package->getData()->data)
            ->with('qrcode', 'localhost:8080'.$request->getRequestUri());
    }

    public function showStatus(){

    }
}
