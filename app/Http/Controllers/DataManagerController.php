<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\Import;

use App\Utils\Export;
class DataManagerController extends Controller
{
    //
    public function importData(Request $request)
    {
        if ($request->hasFile('import')) {
            if ($request->file('import')->isValid()) {
                //
                $path = $request->import->storeAs('imports','import-data-'.date('d-M-y').'.'.$request->import->extension());

                if ($path !== null) {
                    $status = Import::load($path);
                    if ($status) {
                        return response()
                            ->json(["data" => ["info" => "720 row added"]]);                            
                    } else {
                        //return response(400);
                    }
                }
            }
        } else {
            return response('', 418);
        }
    }
}
