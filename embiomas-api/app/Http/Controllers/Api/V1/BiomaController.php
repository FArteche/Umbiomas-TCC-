<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\BiomaResource;
use App\Http\Resources\Api\V1\BiomaDetailResource;
use App\Models\Bioma;
use Illuminate\Http\Request;

class BiomaController extends Controller
{
    public function index()
    {
        return BiomaResource::collection(Bioma::all());
    }

    public function show(Bioma $bioma)
    {
        return new BiomaDetailResource($bioma);
    }
}
