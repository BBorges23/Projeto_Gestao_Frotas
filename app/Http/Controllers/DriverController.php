<?php
namespace App\Http\Controllers;
use App\Models\Driver;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'name.min' => 'Nome tem de estar entre 3 e 255 carateres',
        'name.max' => 'Nome tem de estar entre 3 e 255 carateres',
        'nif.regex' => 'O formato de NIF é inválido (ex: XXXXXXXXX)',
        'nif.unique' => 'O NIF já está registrado.',
        'email.regex' => 'O formato do Email é inválido (ex: teste@gmail.com)',
        'email.unique' => 'O e-mail já está a ser utilizado.',
        'phone.regex' => 'O formato do Telefone é inválido (ex: 912123123)',


    ];
    protected $rules_create = [
        'name'=>'required|min:3|max:255',
        'nif' => 'required|regex:/^[0-9]+$/|unique:drivers,nif',
        'email' => 'required|regex:/^\S+@\S+\.\S+$/|unique:users,email',
        'phone'=>'required|regex:/^\d{9}$/',
        'password' => 'required|min:6',

    ];

    protected $rules_update = [
        'nif' => 'required|regex:/^[0-9]+$/',
        'phone'=>'required|regex:/^\d{9}$/',
        'condition'=>'required'
    ];

    protected $rules_update_gestor = [
        'condition'=>'required'
    ];


    public function pesquisar(Request $request){
        $pesquisa = $request->input('campo_de_pesquisa');

        if (empty($pesquisa)) {
            return redirect()->route(auth()->user()->getTypeUser().'.drivers.index');
        }

        $resultados = Driver::join('users', 'drivers.user_id', '=', 'users.id')
                        ->where('drivers.nif', 'like', '%' . $pesquisa . '%')
                        ->orWhere('users.name', 'like', '%' . $pesquisa . '%')
                        ->get();

        return view('pages.driver.index', compact('resultados'));
    }

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

        // Cria um novo user
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->save();

        // Associa o ID do usuário ao motorista
        $driver = new Driver([
            'nif' => $data['nif'],
            'phone' => $data['phone'],
            'user_id' => $user->id, // ID do usuário associado
        ]);
        $driver->save();

        $user->assignRole('driver');

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

        if ($newState === 'FERIAS') {
            $driver->is_working = 1;
            $driver->condition = $newState;
        }
        elseif ($newState === 'BAIXA')
        {
            $driver->is_working = 1;
            $driver->condition = $newState;
        }
        elseif ($newState === 'DISPONIVEL')
        {
            $driver->is_working = 1;
            $driver->condition = $newState;
        }

        if(auth()->user()->getTypeUser() == 'admin'){
            $data = $request->validate($this->rules_update, $this->msg);
        }
        else{
            $data = $request->validate($this->rules_update_gestor, $this->msg);
        }

        $driver->update($data);
        $driver->save();
        return redirect()->route(auth()->user()->getTypeUser().'.drivers.show', ['driver'=>$driver]);
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

    public function perfil(Driver $driver)
    {
        return view('pages.driverdashboard.show',[
            'driver' => $driver
        ]);
    }

}
