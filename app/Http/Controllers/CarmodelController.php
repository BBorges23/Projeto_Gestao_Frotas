<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Carmodel;
use App\Http\Requests\StoreCarmodelRequest;
use App\Http\Requests\UpdateCarmodelRequest;
use Illuminate\Http\Request;

class CarmodelController extends Controller
{
    /**
     * Mensagens de validação e regras para o modelo de carro.
     */
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'min' => 'Modelo tem de estar entre 3 e 255 carateres',
        'max' => 'Modelo tem de estar entre 3 e 255 carateres'

    ];

    protected $rules = [
        'name'=>'required|min:3|max:255',
        'brand_id' => 'required'
    ];

    /**
     * Pesquisa modelos de carro com base em um campo de pesquisa fornecido.
     */
    public function pesquisar(Request $request){
        $pesquisa = $request->input('campo_de_pesquisa');

        if (empty($pesquisa)) {
            return redirect()->route(auth()->user()->getTypeUser().'.carmodels.index');
        }

        $resultados = Carmodel::where('name', 'like', '%'.$pesquisa.'%')->get();

        return view('pages.carmodel.index', compact('resultados'));
    }

    /**
     * Exibe uma lista paginada de modelos de carro.
     */
    public function index()
    {
        $carmodels = Carmodel::paginate(16);

        return view('pages.carmodel.index', ['carmodel'=>$carmodels]);
    }

    /**
     * Exibe o formulário para criar um novo modelo de carro.
     */
    public function create()
    {
        return view('pages.carmodel.create',['brands' => Brand::all()]);
    }

    /**
     * Armazena um novo modelo de carro no banco de dados.
     */
    public function store(Request $request)
    {
        $dados=$request->validate($this->rules, $this->msg);
        $carmodel = new CarModel($dados);
        $carmodel->save();
        return redirect()->route('admin.carmodels.show', $carmodel);
    }

    /**
     * Exibe os detalhes de um modelo de carro específico.
     */
    public function show(Carmodel $carmodel)
    {
        return view('pages.carmodel.show', ['carmodel'=>$carmodel]);
    }

    /**
     * Exibe o formulário para editar um modelo de carro específico.
     */
    public function edit(Carmodel $carmodel)
    {
        return view('pages.carmodel.edit',[
            'carmodel' => $carmodel,
            'brands' => Brand::all()
        ]);
    }

    /**
     * Atualiza as informações de um modelo de carro no banco de dados.
     */
    public function update(Request $request, Carmodel $carmodel)
    {
        $data = $request->validate($this->rules, $this->msg);
        $carmodel->update($data);
        $carmodel->save();

        return redirect()->route('admin.carmodels.show', ['carmodel' => $carmodel]);
    }

    /**
     * Remove um modelo de carro específico do banco de dados.
     */
    public function destroy(Carmodel $carmodel)
    {
        $carmodel->delete();
        return redirect()->route('admin.carmodels.index');
    }
}
