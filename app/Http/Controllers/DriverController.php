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
        'name.max' => 'Nome tem de estar entre 3 e 255 carateres',
        'nif.regex' => 'O formato de NIF é inválido (ex: XXXXXXXXX)',
        'email.regex' => 'O formato do Email é inválido (ex: teste@gmail.com)',
        'phone.regex' => 'O formato do Telefone é inválido (ex: 912123123)'

    ];
    protected $rules_create = [
        'name'=>'required|min:3|max:255',
        'nif' => 'required|regex:/^[0-9]+$/',
        'email'=>'required|regex:/^\S+@\S+\.\S+$/',
        'phone'=>'required|regex:/^\d{9}$/'
    ];

    protected $rules_update = [
        'name'=>'required|min:3|max:255',
        'nif' => 'required|regex:/^[0-9]+$/',
        'email'=>'required|regex:/^\S+@\S+\.\S+$/',
        'phone'=>'required|regex:/^\d{9}$/',
        'condition'=>'required'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::paginate(16);

        return view('pages.driver.index',
        ['drivers' => $drivers,
            'colorBTN'=> 'btn-success'
        ]);
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
        $data = $request->validate($this->rules_create,$this->msg);
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
        $newState = $request->input('condition');

        if ($newState === 'ATIVO') {
            $driver->is_working = 1;
        }
        elseif ($newState === 'FERIAS')
        {
            $driver->is_working = 1;
        }
        elseif ($newState === 'BAIXA')
        {
            $driver->is_working = 1;
        }

        $data = $request->validate($this->rules_update, $this->msg);
        $driver->update($data);
        $driver->save();
        return redirect()->route('admin.drivers.show', ['driver'=>$driver]);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->update(['is_working' => 0]);
        $driver->condition = 'EX_COLABORADOR';
        $driver->save();
        $driver->delete();
        return redirect()->route('admin.drivers.index');
    }
}
