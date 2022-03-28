<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Imports\PackageImport;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PackageController extends BaseController
{
    public function index() {
        $packages = Package::all();
        return $this->sendResponse(PackageResource::collection($packages), 'Packages retrieved successfully.');
    }

    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'status' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $package = Package::create($input);
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
        $package->name = $input['name'];
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
        Excel::import(new PackageImport, request()->file('file')->store('temp'));
        return back();
    }

    public function indexPage(){
        $packages = $this->index()->getData()->data;
        return view('panel.packages.index')
            ->with('packages', $packages);
    }
}
