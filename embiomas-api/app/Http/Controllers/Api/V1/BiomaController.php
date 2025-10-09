<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\StoreBiomaRequest;
use App\Http\Resources\Api\V1\BiomaResource;
use App\Models\Bioma;
use Illuminate\Http\Request;

class BiomaController extends Controller
{
    public function index(){
        return BiomaResource::collection(Bioma::all());
    }
    public function store(StoreBiomaRequest $request){
        $bioma = Bioma::create($request->validated());
        return new BiomaResource($bioma);
    }
    public function show(Bioma $bioma){
        return new BiomaResource($bioma);
    }
}
