<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Travel;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'max' => 'Coordenadas tem de estar entre 3 e 255 carateres'

    ];

    protected $rules_create = [
        'vehicle_id' => 'required',
        'driver_id' => 'required',
        'coords_origem'=>'required|max:255',
        'coords_destino' => 'required|max:255',
    ];

    protected $rules_update = [
        'vehicle_id' => 'required',
        'driver_id' => 'required',
        'coords_origem'=>'required|max:255',
        'coords_destino' => 'required|max:255',
        'state' => 'required'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::paginate(16);

        return view('pages.travel.index',
            ['travels'=> $travels
            ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pages.travel.create',[
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules_create, $this->msg);
        $travel = new Travel($data);
        $travel->save();
        return redirect()->route('admin.travels.show',$travel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {

        return view('pages.travel.show', [
            'travel' => $travel,
            'driver'=>  $travel->driver,
            'vehicle' => $travel->vehicle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        return view('pages.travel.edit',[
            'travel' => $travel,
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $newState = $request->input('state');

        if ($newState === 'CANCELADO') {
            $travel->is_traveling = 0;
        }
        elseif ($newState === 'CONCLUIDO')
        {
            $travel->is_traveling = 0;
        }
        else
            $travel->is_traveling = 1;

        $data = $request->validate($this->rules_update,$this->msg);
        $travel->update($data);
        $travel->save();
        return redirect()->route('admin.travels.show', ['travel' => $travel]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        $travel->update(['is_traveling' => 0]);
        $travel->state = 'CANCELADO';
        $travel->save();
        $travel->delete();
        return redirect()->route('admin.travels.index');
    }
}
