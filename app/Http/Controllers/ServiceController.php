<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Service;
use App\Http\Resources\Service as ServiceResource;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtener los articulos
        $services = Service::paginate(10);

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
}
