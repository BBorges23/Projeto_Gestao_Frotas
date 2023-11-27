<?php
namespace App\Http\Controllers;
use App\Models\Maintenance;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vehicle;
use Cassandra\Date;
use Illuminate\Http\Request;
use function Sodium\add;

class MaintenanceController extends Controller
{
    // Mensagens de validação
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'date_entry.after_or_equal' => 'A data de entrada não pode ser no passado'
    ];

    // Regras de validação para criação de manutenção
    protected $rules_create = [
        'vehicle_id' => 'required',
        'motive' => 'required',
        'date_entry' => 'required|date|after_or_equal:today'
    ];

    // Regras de validação para atualização de manutenção
    protected  $rules_update = [
        'vehicle_id' => 'required',
        'motive' => 'required',
        'date_entry' => 'required',
        'date_exit' => 'required'

    ];

    /**
     * Pesquisa e filtra as manutenções com base no estado e no campo de pesquisa.
     */
    public function pesquisar(Request $request)
    {
        // Atualiza ou remove os status selecionados se o formulário foi submetido
        if ($request->has('status_m')) {
            $selectedStatuses = $request->input('status_m', []);
            session(['selectedStatuses_m' => $selectedStatuses]); // Ajuste na chave da sessão
        } elseif ($request->has('deselect_status_m')) {
            // Se um status foi desmarcado, remove esse status da sessão
            $deselectedStatus = $request->input('deselect_status_m'); // Ajuste no input
            $selectedStatuses = session('selectedStatuses_m', []); // Ajuste na chave da sessão
            if (($key = array_search($deselectedStatus, $selectedStatuses)) !== false) {
                unset($selectedStatuses[$key]);
            }
            session(['selectedStatuses_m' => $selectedStatuses]); // Ajuste na chave da sessão
        } else {
            // Se o formulário não foi submetido, usa os status da sessão
            $selectedStatuses = session('selectedStatuses_m', []); // Ajuste na chave da sessão
        }

        // Recebe a pesquisa de texto se foi submetida
        $pesquisa = $request->input('campo_de_pesquisa', '');

        // Inicia a consulta com os joins necessários
        $query = Maintenance::query()
            ->distinct()
            ->join('vehicles', 'maintenances.vehicle_id', '=', 'vehicles.id');

        // Se houver status selecionados, filtra as manutenções que correspondem a qualquer um dos status selecionados
        if (!empty($selectedStatuses)) {
            $query->whereIn('maintenances.driver_state', $selectedStatuses);
        }

        // Aplica a pesquisa de texto independentemente dos status selecionados
        if (!empty($pesquisa)) {
            $query->where(function ($subquery) use ($pesquisa) {
                $subquery->where('vehicles.licence_plate', 'like', '%' . $pesquisa . '%')
                    ->orWhere('maintenances.motive', 'like', '%' . $pesquisa . '%');
            });
        }

        // Obtém os resultados da consulta
        $resultados = $query->paginate(18);

        // Retorna a view com as manutenções filtradas
        return view('pages.maintenance.index', ['resultados' => $resultados]);
    }

    /**
     * Exibe uma lista de manutenções em andamento.
     */
    public function index()
    {
        $maintenances = Maintenance::where('state', 'PROCESSANDO')
            ->orderBy('updated_at', 'desc') // Adiciona ordenação por updated_at em ordem decrescente
            ->paginate(18);

        return view('pages.maintenance.index', [
            'maintenances'=>$maintenances]);
    }

    /**
     * Exibe o formulário de criação de manutenção.
     */
    public function create()
    {
        return view('pages.maintenance.create', [
            'vehicles'=>Vehicle::all()]);
    }

    /**
     * Armazena uma nova manutenção no banco de dados.
     */
    public function store(Request $request)
    {
        $data=$request->validate($this->rules_create, $this->msg);

        $maintenance = new Maintenance($data);


        $vehicle_used = Vehicle::where('id', $maintenance->vehicle_id)->first();
        $vehicle_used->condition = "EM MANUTENÇÃO";
        $vehicle_used->save();
        $maintenance->save();
        return redirect()->route(auth()->user()->getTypeUser().'.maintenances.show', $maintenance);
    }

    /**
     * Exibe os detalhes de uma manutenção específica.
     */
    public function show(Maintenance $maintenance)
    {
        return view('pages.maintenance.show', [
            'maintenance' => $maintenance,
            'vehicle' => $maintenance->vehicle
        ]);
    }

    /**
     * Exibe o formulário de edição de uma manutenção específica.
     */
    public function edit(Maintenance $maintenance)
    {
        return view('pages.maintenance.edit', [
            'maintenance' => $maintenance,
            'vehicles' => Vehicle::all()
        ]);
    }

    /**
     * Atualiza as informações de uma manutenção no banco de dados.
     */
    public function update(Request $request, Maintenance $maintenance)

    {
        $newState = $request->input('state');

        if ($newState === 'CANCELADO') {
            $maintenance->is_active = 0;
            $maintenance->state = $newState;
        }
        elseif ($newState === 'CONCLUIDO')
        {
            $maintenance->is_active = 0;
            $maintenance->state = $newState;
        }
        else
        {
            $maintenance->is_active = 1;
            $maintenance->state = $newState;
        }

        $data=$request->validate($this->rules_update, $this->msg);
        $maintenance->update($data);
        $maintenance->save();
        return view('pages.maintenance.show', ['maintenance' => $maintenance]);
    }

    /**
     * Remove uma manutenção do banco de dados.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('admin.maintenances.index');
    }

    public function cancel(Request $request, Maintenance $maintenance)
    {
        $user_log = User::where('id', auth()->user()->id)->first();
        $name = $user_log->name;
        $description = $maintenance->comments ."\n". date('d-m-Y H:i') . " - " . $name . ": " . $request->input('text');

        if ($description) {

            $maintenance->date_exit = date('Y-m-d');
            $maintenance->update(['state' => 'CANCELADO','is_active' => 0, 'comments' => $description]);
            $maintenance->save();

            $vehicle_used = Vehicle::where('id',$maintenance->vehicle_id)->first();
            $vehicle_used->condition = "DISPONIVEL";
            $vehicle_used->save();

            return response()->json(['message' => 'Descrição atualizada com sucesso']);
        }

        return response()->json(['message' => 'Falha na atualização da descrição'], 400);
    }

    /**
     * Conclui uma manutenção.
     */
    public function conclude(Request $request, Maintenance $maintenance)
    {
        $user_log = User::where('id', auth()->user()->id)->first();
        $name = $user_log->name;
        $description = $maintenance->comments ."\n". date('d-m-Y H:i') . " - " . $name . ": " . $request->input('text');


        if ($description) {
            //gestor
            $maintenance->date_exit = date('Y-m-d');
            $maintenance->update(['state' => 'CONCLUIDO', 'is_active' => 0, 'comments' => $description]);
            $maintenance->save();

            $vehicle_used = Vehicle::where('id',$maintenance->vehicle_id)->first();
            $vehicle_used->condition = "DISPONIVEL";

            $vehicle_used->save();

            return response()->json(['message' => 'Descrição atualizada com sucesso']);
        }

        return response()->json(['message' => 'Falha na atualização da descrição'], 400);
    }

    /**
     * Aceita uma manutenção.
     */
    public function accept(Maintenance $maintenance)
    {
        $vehicle_used = Vehicle::where('id',$maintenance->vehicle_id)->first();
        $vehicle_used->condition = "EM MANUTENÇÃO";
        $vehicle_used->save();

        $maintenance->update(['is_active' => 1, 'driver_state' => 'ACEITE']);
        $maintenance->save();

        return response()->json(['message' => 'Descrição atualizada com sucesso']);
    }

    /**
     * Exibe o histórico de manutenções concluídas ou canceladas.
     */
    public function history()
    {
        $maintenances = Maintenance::where('state', 'CONCLUIDO')
            ->orWhere('state','CANCELADO')
            ->orderBy('updated_at', 'desc')
            ->paginate(16);

        return view('pages.maintenance.history',[
            'maintenances'=>$maintenances]);
    }
}
