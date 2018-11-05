<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Service;
use App\Filter;
use App\Http\Resources\Service as ServiceResource;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = 10;
        // obtener los articulos
       
        if ($request->has('filters')) {        
            $services = Service::whereHas('filters', function($query) use ($request){
                $query->whereIn('id', $request->filters);
           });
        }
        if($request->has('service')) {
            //filter by name, slug, summary or description (tags?)
            $funcWhere = function($query) use ($request){
                $query->where('slug', 'LIKE', '%'.$request->service.'%')
                    ->orWhere('name', 'LIKE', '%'.$request->service.'%')
                    ->orWhere('summary', 'LIKE', '%'.$request->service.'%');
            };
            if (!isset($services)) {
                $services = Service::where($funcWhere);
            } else {
                $services = $services->where($funcWhere);
            }                     
        }
        //pagination config by url query
        $services = isset($services) ? $services->paginate($request->has('per_page')? $request->per_page : $perPage): Service::all();
        //collection de servicios
        return ServiceResource::collection($services);
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = Service::create($request->input());
        return new ServiceResource($service);
    }

    /**
     * 
     * 
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->input());
        return new ServiceResource($service);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return new ServiceResource($service);
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
        $service = Service::findOrFail($id);
        if ($service->delete()) {
            return new ServiceResource($service);
        }
    }

    #filtros
    public function associateFilter($id, $idFilter)
    {
        $service = Service::find($id);
        $hasFilter = $service->filters->where('id', $idFilter)->first();

        if ($hasFilter !== null) {
            return response()->json([
                'message' => 'filter "'.$hasFilter->name.'" is already associated'
            ]);
        }
        
        //$filter =  Filter::find($idFilter);
        $service->filters()->attach($idFilter);
        #reemplazar response adecuada
        $service = Service::find($id);
        return new ServiceResource($service);
    }

    public function removeFilter($id, $idFilter)
    {
        $service = Service::find($id);
        $filter = $service->filters->where('id', $idFilter)->first();

        if ($filter === null) {
            return response()->json([
                'message' => 'nothing to detach'
            ]);
        }
        $service->filters()->detach($idFilter);
        #reemplazar response adecuada
        $service = Service::find($id);
        return new ServiceResource($service);
    }
}
