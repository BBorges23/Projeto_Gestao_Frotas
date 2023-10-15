<?php
namespace App\Http\Controllers;
use App\Models\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DriverController extends Controller
{
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'name.min' => 'Nome tem de estar entre 3 e 255 carateres',
        'name.max' => 'Nome tem de estar entre 3 e 255 carateres'

    ];
    protected $rules = [
        'name'=>'required|min:3|max:255',
        'nif' => 'required|regex:/^[A-Z]{2}-\d{2}-[A-Z]{2}$/',
        'email'=>'required',
        'contato'=>'required'

    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.driver.index', ['drivers'=>Driver::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pages.driver.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules,$this->msg);
        $driver = new Driver($data);
        $driver->save();
        return redirect()->route('admin.drivers.index',$driver);
    }
    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        return view('pages.driver.show',[
            'driver' => $driver
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('pages.driver.edit', [
            'driver' => $driver
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $data = $request->all();
        $driver->update($data);
        $driver->save();
        return redirect()->route('admin.drivers.show', ['driver'=>$driver]);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('admin.drivers.index');
    }
}
