<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
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
        $response['message'] = "All Orders Data";
        $response['data'] = OrderResource::collection(auth('api')->user()->Order);
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        
        $response['success'] = true;
        $response['message'] = "A New Order Created";
        $result = auth('api')->user()->Order()->create($request->all());
        $response['data'] = new OrderResource($result);
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
        $response['message'] = "Order Data Detail";
        $response['data'] = new OrderResource(auth('api')->user()->Order()->findOrFail($id));
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $Order = auth('api')->user()->Order()->findOrFail($id);
        $response['success'] = true;
        $response['message'] = "A Order With ID : ".$id." Updated";
        $result = $Order->update($request->all());
        $response['data'] = new OrderResource($Order);
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
        $Order = auth('api')->user()->Order()->findOrFail($id);
        $Order->delete();
        $response['success'] = true;
        $response['message'] = "A Order With ID : ".$id." Deleted";
        return response()->json($response);
    }
}
