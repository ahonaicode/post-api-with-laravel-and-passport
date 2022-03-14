<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Resources\SaleResource;
use App\Http\Requests\UpdateSaleRequest;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['success'] = true;
        $response['message'] = "All Sales Data";
        $response['data'] = SaleResource::collection(auth('api')->user()->sale);
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        
        $response['success'] = true;
        $response['message'] = "A New Sale Created";
        $result = auth('api')->user()->sale()->create($request->all());
        $response['data'] = new SaleResource($result);
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['success'] = true;
        $response['message'] = "Sale Data Detail";
        $response['data'] = new SaleResource(auth('api')->user()->sale()->findOrFail($id));
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, $id)
    {
        $sale = auth('api')->user()->sale()->findOrFail($id);
        $response['success'] = true;
        $response['message'] = "A Sale With ID : ".$id." Updated";
        $result = $sale->update($request->all());
        $response['data'] = new SaleResource($sale);
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = auth('api')->user()->sale()->findOrFail($id);
        $sale->delete();
        $response['success'] = true;
        $response['message'] = "A Sale With ID : ".$id." Deleted";
        return response()->json($response);
    }
}
