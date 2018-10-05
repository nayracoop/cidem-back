<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\FilterType;
use App\Http\Resources\FilterType as FilterTypeResource;

class FilterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterTypes = FilterType::all();
        return FilterTypeResource::collection($filterTypes);
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
    }

    public function filterTree()
    {
        return response()->json([
            "data" => 
            [   
                [
                    "type" => "Frutas",
                    "filters" => [
                        ["id" => 1, "name" => "peras" ],   
                        ["id" => 2, "name" => "manzanas" ],
                        ["id" => 3, "name" => "uvas" ],
                        ["id" => 4, "name" => "bananas" ],
                        ["id" => 5, "name" => "naranjas" ],
                    ]
               ],
               [
                    "type" => "Verduras",
                    "filters" => [
                        ["id" => 6, "name" => "rucula" ],   
                        ["id" => 7, "name" => "espinaca" ],
                        ["id" => 8, "name" => "acelga" ],
                        ["id" => 9, "name" => "lechuga" ],
                    ]
               ],
               [
                    "type" => "Bebidas",
                    "filters" => [
                            ["id" => 10, "name" => "agua" ],   
                            ["id" => 11, "name" => "mate" ],
                            ["id" => 12, "name" => "cafe" ],
                            ["id" => 13, "name" => "vino" ],
                            ["id" => 14, "name" => "cerveza" ],
                    ]
               ]
            ]    

        ]);
    }
}
