<?php

namespace App\Http\Controllers;

use App\Models\FleetData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

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
            $fleetData->make = $request->input('make');
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
            $i = 0;
            $j = 0;
            $k = 0;
            $contets = Storage::get('VEHICLE2.csv');
            $lines = explode(PHP_EOL, $contets);
            foreach ($lines as $line) {
                $data = explode('|', $line);
                $fleetData = new FleetData;
                $fleetData->carId = $data[1];
                $fleetData->make = $data[2];
                $fleetData->model = $data[3];
                $fleetData->description = $data[4];
                $fleetData->segment = $data[5];
                $fleetData->vehicle_type = $data[6];
                $fleetData->body_style = $data[7];
                $fleetData->introduction_date = explode("-",$data[8])[0];
                $fleetData->end_date = explode("-",$data[9])[0];
                $fleetData->number_doors = $data[12];
                $fleetData->number_seats = $data[13];
                $fleetData->fuel_type = $data[15];
                $fleetData->power_cv = $data[17];
                $fleetData->power_kw = $data[19];
                $fleetData->transmision_type = $data[40];
                $fleetData->model_year = $data[70];
                if ($fleetData->where('carId', '=', $data[1])->first()) {
                    $j++;
                } else {
                    if($data[1] === "CARID"){
                        $k++;
                    }else{
                        $fleetData->save();
                        $i++;
                    }
                }
            }
            return response()->json(array('added' => $i,'updated' => $j ,'failed' => $k), 200);
        } else {
            return response()->json(array('message' => 'fail', 'error' => "Incorrect key"), 500);
        }
    }
}
