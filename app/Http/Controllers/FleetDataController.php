<?php

namespace App\Http\Controllers;

use App\Models\FleetData;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class FleetDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FleetData::all('id', 'carId');
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
        try {
            $fleetData = new FleetData;
            $fleetData->carId = $request->input('carId');
            $fleetData->save();
            return response()->json(array('success' => true, 'id' => $fleetData->id), 200);
        } catch (\Exception $e) {
            return response()->json(array('error' => $e), 500);
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

    /**
     * Process fleetData files to DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        if ($request->input('key') == "123") {
            return response()->json(array('message' => 'success','key' => $request->input('key')), 200);
        } else {
            return response()->json(array('message' => 'fail','error' => "Incorrect key"), 500);
        }
    }
}
