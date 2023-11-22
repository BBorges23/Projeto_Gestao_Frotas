<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Psy\Util\Str;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $msg = [
        'required' => 'Preencha todos os campos',
        'name.min' => 'Nome tem de estar entre 3 e 255 carateres',
        'name.max' => 'Nome tem de estar entre 3 e 255 carateres',
        'email.regex' => 'O formato do Email é inválido (ex: teste@gmail.com)',
        'email.unique' => 'O e-mail já está a ser utilizado.',
    ];
    protected $rules_create = [
        'name'=>'required|min:3|max:255',
        'email' => 'required|regex:/^\S+@\S+\.\S+$/|unique:users,email',
        'password' => 'required|min:6',
        'roles' =>'required',
    ];

    protected $rules_update = [
        'email'=>'required',
    ];


    public function pesquisar(Request $request){
        $pesquisa = $request->input('campo_de_pesquisa');

        if (empty($pesquisa)) {
            return redirect()->route(auth()->user()->getTypeUser().'.accounts.index');
        }

        $resultados = User::where('users.email', 'like', '%' . $pesquisa . '%')
            ->orWhere('users.name', 'like', '%' . $pesquisa . '%')
            ->get();

        return view('pages.account.index', compact('resultados'));
    }

    public function index()
    {
        $users = User::paginate(16);

        return view('pages.account.index',
            ['users' => $users,
                'colorBTN'=> 'btn-success'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view ('pages.account.create',['users'=>User::all()],compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */

    /*
     * Funcionalidade de criar utilizador imcompleta
     * Falta ver o email verificado, o id para depois se associar ao motorista
     * Falta ver o remember_token que não está a ser associado
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules_create,$this->msg);

        Log::info('Valor recebido de roles:', ['roles' => $data['roles'] ?? 'Não fornecido']);

        // Cria um novo user
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => date('d-m-Y H:i'), // Define a data atual para email_verified_at
            'remember_token' => bin2hex(random_bytes(10)), // Gera um token aleatório para remember_token
        ]);
        $user->save();

        if (isset($data['roles'])) {
            // Busca a role pelo ID
            $role = Role::find($data['roles']);

            if ($role) {
                // Atribui a role ao usuário
                $user->assignRole($role->name);
            } else {
                // Tratar o caso em que a role não existe
                return redirect()->back()->withErrors(['role' => 'A role selecionada é inválida.']);
            }
        } else {
            // Tratar o caso em que a role não foi fornecida
            return redirect()->back()->withErrors(['role' => 'Role não foi fornecida.']);
        }

        return redirect()->route('admin.accounts.index',$user)->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Encontrar o usuário pelo ID
        $user = User::find($id);



        // Verificar se o usuário foi encontrado
        if ($user) {
            // Retornar a view com os dados do usuário
            return view('pages.account.show', [
                'user' => $user
            ]);
        } else {
            // Redirecionar ou mostrar uma mensagem de erro se o usuário não for encontrado
            return redirect()->back()->with('error', 'utilizador não encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Encontrar o usuário pelo ID
        $user = User::find($id);

        $roles = Role::all();

        // Verificar se o usuário foi encontrado
        if ($user) {
            // Retornar a view com os dados do usuário
            return view('pages.account.edit', ['user' => $user],compact('roles'));
        } else {
            // Redirecionar ou mostrar uma mensagem de erro se o usuário não for encontrado
            return redirect()->back()->with('error', 'Utilizador não encontrado.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados de entrada
        $data = $request->validate($this->rules_update, $this->msg);

        // Localiza o motorista pelo ID
        $user = User::findOrFail($id);

        // Atualiza o motorista com os novos dados
        $user->update($data);

        // Redireciona para a página de exibição do motorista com o ID do usuário
        return redirect()->route(auth()->user()->getTypeUser() . '.accounts.show', ['account' => $user->id])
                         ->with('userId', $user->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // Localiza o driver pelo ID e exclui
        User::findOrFail($id)->delete();

        // Redireciona para a lista de drivers
        return redirect()->route('admin.accounts.index');
    }
}
