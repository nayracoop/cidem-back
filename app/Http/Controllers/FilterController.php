<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Filter;
use App\Http\Resources\Filter as FilterResource;
use App\Http\Resources\Service as ServiceResource;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters= Filter::all();
        return FilterResource::collection($filters);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $filter = Filter::create($request->input());
        return new FilterResource($filter);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $filter = Filter::find($id);
        $filter->update($request->input());
        return new FilterResource($filter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $filter = Filter::findOrFail($id);
        $count = $filter->services->count();

        if($count > 0) {
            return response()->json([
                'code' => 'CANNOT_DELETE',
                'message' => 'Can not delete. The filter '.$filter->name.' has '.$count.' associated filters'
            ]);
        }

        if ($filter->delete()) {
            return new FilterResource($filter);
        }
    }
    /**
     * listar servicios asociados a un filtro
     */
    public function services($id) {
        $filter = Filter::find($id);
        return ServiceResource::collection($filter->services);
    }
}
