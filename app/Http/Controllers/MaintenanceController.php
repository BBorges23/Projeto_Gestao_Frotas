<?php
namespace App\Http\Controllers;
use App\Models\Maintenance;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupere o motorista atualmente autenticado
        $driver = auth()->user();

        // Recupere as manutenções associadas a esse motorista
        $maintenance = $driver->maintenance;

        // Armazene as manutenções na sessão
        session(['maintenance' => $maintenance, 'driver' => $driver]);

        $maintenances = Maintenance::paginate(3);
        return view('pages.maintenance.index', ['maintenances'=>$maintenances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.maintenance.create', ['vehicles'=>Vehicle::all()]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $maintenance = new Maintenance($data);
        $maintenance->save();
        return redirect()->route('admin.maintenances.show', $maintenance);
    }
    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        return view('pages.maintenance.show', [
            'maintenance' => $maintenance,
            'vehicle' => $maintenance->vehicle
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        return view('pages.maintenance.edit', [
            'maintenance' => $maintenance,
            'vehicles' => Vehicle::all()
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $data=$request->all();
        $maintenance->update($data);
        $maintenance->save();
        return view('pages.maintenance.show', ['maintenance' => $maintenance]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('admin.maintenances.index');
    }
}
