<?php
namespace App\Http\Controllers;
use App\Models\Driver;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DriverController extends Controller
{
    // Mensagens de validação
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
    // Regras de validação para criação de motorista
    protected $rules_create = [
        'name'=>'required|min:3|max:255',
        'nif' => 'required|regex:/^[0-9]+$/|unique:drivers,nif',
        'email' => 'required|regex:/^\S+@\S+\.\S+$/|unique:users,email',
        'phone'=>'required|regex:/^\d{9}$/',
        'password' => 'required|min:6',
    ];

    // Regras de validação para atualização de motorista
    protected $rules_update = [
        'nif' => 'required|regex:/^[0-9]+$/',
        'phone'=>'required|regex:/^\d{9}$/',
        'condition'=>'required'
    ];

    // Regras de validação para atualização de motorista por gestor
    protected $rules_update_gestor = [
        'condition'=>'required'
    ];

    /**
     * Pesquisa e filtra motoristas com base no estado e no campo de pesquisa.
     */
    public function pesquisar(Request $request){
        // Atualiza ou remove os estados selecionados se o formulário de estados foi submetido
        if ($request->has('status')) {
            $selectedStatuses = $request->input('status', []);
            session(['selectedStatuses' => $selectedStatuses]);
        } elseif ($request->has('deselect_status')) {
            // Se uma checkbox foi desmarcada, remove esse estado da sessão
            $deselectedStatus = $request->input('deselect_status');
            $selectedStatuses = session('selectedStatuses', []);
            if(($key = array_search($deselectedStatus, $selectedStatuses)) !== false) {
                unset($selectedStatuses[$key]);
            }
            session(['selectedStatuses' => $selectedStatuses]);
        } else {
            // Se o formulário de estados não foi submetido, usa os estados da sessão
            $selectedStatuses = session('selectedStatuses', []);
        }

        // Recebe a pesquisa de texto se foi submetida
        $pesquisa = $request->input('campo_de_pesquisa', '');

        $query = Driver::query()
            ->select('drivers.*') // Especifica as colunas e usa alias para evitar conflito
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->distinct();

        if (!empty($selectedStatuses)) {
            $query->whereIn('drivers.condition', $selectedStatuses);
        }

        if (!empty($pesquisa)) {
            $query->where(function ($subquery) use ($pesquisa) {
                $subquery->where('drivers.nif', 'like', '%' . $pesquisa . '%')
                    ->orWhere('users.name', 'like', '%' . $pesquisa . '%');
            });
        }

        $query->groupBy('drivers.id');

        $resultados = $query->paginate(16);
        return view('pages.driver.index',compact('resultados'));
    }

    /**
     * Exibe a lista de motoristas.
     */
    public function index()
    {
        $drivers = Driver::orderBy('updated_at','desc')->paginate(16);

        return view('pages.driver.index',
        ['drivers' => $drivers,
            'colorBTN'=> 'btn-success'
        ]);
    }

    /**
     * Exibe o formulário de criação de motorista.
     */
    public function create()
    {
        return view ('pages.driver.create');
    }

    /**
     * Armazena um novo motorista no banco de dados.
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
     * Exibe os detalhes de um motorista específico.
     */
    public function show(Driver $driver)
    {
        return view('pages.driver.show',[
            'driver' => $driver
        ]);
    }

    /**
     * Exibe o formulário de edição de um motorista específico.
     */
    public function edit(Driver $driver)
    {
        return view('pages.driver.edit', [
            'driver' => $driver
        ]);
    }

    /**
     * Atualiza as informações de um motorista no banco de dados.
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
     * Remove um motorista do banco de dados.
     */
    public function destroy(Driver $driver)
    {
        $driver->update(['is_working' => 0]);
        $driver->condition = 'EX_COLABORADOR';
        $driver->save();
        $driver->delete();
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Exibe o perfil de um motorista.
     */
    public function perfil(Driver $driver)
    {
        return view('pages.driverdashboard.show',[
            'driver' => $driver
        ]);
    }

    /**
     * Exibe o histórico de motoristas excluídos.
     */
    public function history()
    {
        $drivers = Driver::onlyTrashed()->get();
        return view('pages.driver.history',[
            'drivers'=>$drivers]);
    }

    /**
     * Exibe detalhes de um motorista excluído.
     */
    public function delete(int $id)
    {
        $drivers = Driver::withTrashed()->find($id);

        return view('pages.driver.show',[
            'driver'=>$drivers]);
    }

}
