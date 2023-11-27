<?php
namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Travel;
use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class VehicleController extends Controller
{
    // Regras de validação e mensagens associadas
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'min' => 'Insira um ano entre 1950-2023',
        'max' => 'Insira um ano entre 1950-2023',
        'regex'=> 'Formato inválido para Matrícula (AA-11-BB)'
    ];
    protected $rules = [
        'carmodel_id'=>'required',
        'licence_plate' => 'required|regex:/^[A-Z]{2}-\d{2}-[A-Z]{2}$/',
        'year'=>'required|min:4|max:4',
        'date_buy'=>'required',
        'condition' => 'required',
    ];

    // Método para pesquisar veículos com filtros
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
        $pesquisa = $request->input('campo_de_pesquisa');

        // Inicia a consulta com os joins necessários
        $query = Vehicle::query()
            ->select('vehicles.*') // Especifica as colunas e usa alias para evitar conflito
            ->distinct();

        // Se houver estados selecionados, filtra os veículos que correspondem a qualquer um dos estados selecionados
        if (!empty($selectedStatuses)) {
            $query->whereIn('vehicles.condition', $selectedStatuses);
        }

        // Aplica a pesquisa de texto independentemente dos estados selecionados
        if (!empty($pesquisa)) {
            $query->where(function ($subquery) use ($pesquisa) {
                $subquery->where('year', 'like', '%'.$pesquisa.'%')
                    ->orWhere('licence_plate', 'like', '%'.$pesquisa.'%');
            });
        }

        $query->groupBy('vehicles.id');

        // Obtém os resultados da consulta paginados
        $resultados = $query->paginate(18);
        return view('pages.vehicle.index', compact('resultados'));
    }

    /**
     * Apresenta uma listagem dos veículos.
     */
    public function index()
    {
        // Obtém veículos excluindo aqueles com condição de 'PERDA_TOTAL'
        $vehicles = Vehicle::where('condition', '!=', 'PERDA_TOTAL')
            ->paginate(18);

        return view('pages.vehicle.index', ['vehicles' => $vehicles]);
    }

    /**
     * Mostra o formulário para criar um novo veículo.
     */
    public function create()
    {
        // Retorna a view com os modelos de carro disponíveis
        return view('pages.vehicle.create', ['carmodels'=>Carmodel::all()]);
    }

    /**
     * Armazena um novo veículo na base de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $data = $request->validate($this->rules,$this->msg);
        // Cria um novo veículo com os dados fornecidos
        $vehicle = new Vehicle($data);
        // Salva o veículo no banco de dados
        $vehicle->save();
        // Redireciona para a página de visualização do veículo recém-criado
        return redirect()->route('admin.vehicles.show', $vehicle);
    }

    /**
     * Mostra os detalhes de um veículo específico.
     */
    public function show(Vehicle $vehicle)
    {
        // Retorna a view com detalhes do veículo e o modelo associado
        return view('pages.vehicle.show', [
            'vehicle' => $vehicle,
            'model' => $vehicle->model]);
    }

    /**
     * Mostra o formulário para editar um veículo específico.
     */
    public function edit(Vehicle $vehicle)
    {
        // Retorna a view com o formulário de edição do veículo e os modelos disponíveis
        return view('pages.vehicle.edit', [
            'vehicle' => $vehicle,
            'carmodels' => Carmodel::all()
        ]);
    }

    /**
     * Atualiza um veículo específico na base de dados.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        // Obtém o novo estado do veículo
        $newCondition = $request->input('condition');

        // Lógica para determinar o estado do veículo com base no novo estado
        if ($newCondition === 'DISPONIVEL') {
            $vehicle->is_driving = 0;
            $vehicle->condition = $newCondition;
        }
        elseif ($newCondition === 'VENDIDO')
        {
            $vehicle->is_driving = 0;
            $vehicle->deleted_at = date('d-m-Y H:i');
            $vehicle->condition = $newCondition;
        }
        elseif($newCondition === 'PERDA_TOTAL')
        {
            $vehicle->is_driving = 0;
            $vehicle->deleted_at = date('d-m-Y H:i');
            $vehicle->condition = $newCondition;
        }
        elseif($newCondition === 'EM VIAGEM')
        {
            $vehicle->is_driving = 1;
            $vehicle->condition = $newCondition;
        }
        elseif($newCondition === 'EM MANUTENCAO')
        {
            $vehicle->is_driving = 0;
            $vehicle->condition = $newCondition;
        }

        // Valida os dados do formulário
        $data = $request->validate($this->rules, $this->msg);
        // Atualiza o veículo com os dados fornecidos
        $vehicle->update($data);
        // Salva as alterações no banco de dados
        $vehicle->save();

        // Redireciona para a página de visualização do veículo
        if($newCondition === 'PERDA_TOTAL' || 'VENDIDO')
        {
            return redirect()->route('admin.vehicles.index');
        }
        else
            return redirect()->route('admin.vehicles.show', ['vehicle'=>$vehicle]);
    }

    /**
     * Remove um veículo específico da base de dados.
     */
    public function destroy(Vehicle $vehicle)
    {
        // Remove o veículo (soft delete)
        $vehicle->delete();
        // Redireciona para a página de índice de veículos
        return redirect()->route('admin.vehicles.index');
    }

    /**
     * Apresenta o histórico de todos os veículos (incluindo os soft deleted).
     */
    public function history()
    {
        // Obtém todos os veículos, incluindo aqueles excluídos
        $vehicles = Vehicle::onlyTrashed()->get();
        // Retorna a view com o histórico de veículos
        return view('pages.vehicle.history',[
            'vehicles'=>$vehicles]);
    }

    /**
     * Apresenta detalhes de um veículo soft deleted.
     */
    public function delete(int $id)
    {
        // Encontra o veículo, incluindo aqueles excluídos
        $vehicles = Vehicle::withTrashed()->find($id);
        // Retorna a view com detalhes do modelo e veículo
        return view('pages.vehicle.show',[
            'model' => $vehicles->model,
            'vehicle'=>$vehicles]);
    }
}
