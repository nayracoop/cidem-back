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
            //$sint = $request->service;
            if (!isset($services)) {
                $services = Service::where('name', 'like', "%$request->service%");
            } else {
                $services = $services->where('name', 'like', "%$request->service%");
            }

            //filter by name, summary or description (tags?)
            
            #$services = $services->orWhere('description', 'like', "%$request->service%");
            $services = $services->orWhere('summary', 'like', "%$request->service%");
            $services = $services->orWhere('slug', 'like', "%$request->service%");
            //pagination config by url query
            
        }

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
        //
        $service = $request->isMethod('put') ? Service::findOrFail($request->service_id) : new Service;

        $service->name = $request->input('name');
        $service->slug = str_slug($service->name);
        #chequear que el slug sea unique
        $service->summary = $request->input('summary');
        $service->description = $request->input('description');
        $service->icon = $request->input('icon');
        #subir img al server
        $service->website = $request->input('website');

        if ($service->save()) {
            return new ServiceResource($service);
        }
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
        $filter =  Filter::find($idFilter);
        $service->filters()->attach($filter);
        #reemplazar response adecuada
        return new ServiceResource($service);
    }

    public function removeFilter($id, $idFilter)
    {
        $service = Service::find($id);
        $service->filters()->detach($id);
        #reemplazar response adecuada
        return response();
    }
}
