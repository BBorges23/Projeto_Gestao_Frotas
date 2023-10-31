<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Carmodel;
use App\Http\Requests\StoreCarmodelRequest;
use App\Http\Requests\UpdateCarmodelRequest;
use Illuminate\Http\Request;

class CarmodelController extends Controller
{
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'min' => 'Modelo tem de estar entre 3 e 255 carateres',
        'max' => 'Modelo tem de estar entre 3 e 255 carateres'

    ];

    protected $rules = [
        'name'=>'required|min:3|max:255',
        'brand_id' => 'required'
    ];



    public function pesquisar(Request $request){
        $pesquisa = $request->input('campo_de_pesquisa');

        if (empty($pesquisa)) {
            return redirect()->route(auth()->user()->getTypeUser().'.carmodels.index');
        }

        $resultados = Carmodel::where('name', 'like', '%'.$pesquisa.'%')->get();

        return view('pages.carmodel.index', compact('resultados'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carmodels = Carmodel::paginate(16);

        return view('pages.carmodel.index', ['carmodel'=>$carmodels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.carmodel.create',['brands' => Brand::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados=$request->validate($this->rules, $this->msg);
        $carmodel = new CarModel($dados);
        $carmodel->save();
        return redirect()->route('admin.carmodels.show', $carmodel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Carmodel $carmodel)
    {
        return view('pages.carmodel.show', ['carmodel'=>$carmodel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carmodel $carmodel)
    {
        return view('pages.carmodel.edit',[
            'carmodel' => $carmodel,
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carmodel $carmodel)
    {
        $data = $request->validate($this->rules, $this->msg);
        $carmodel->update($data);
        $carmodel->save();

        return redirect()->route('admin.carmodels.show', ['carmodel' => $carmodel]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carmodel $carmodel)
    {
        $carmodel->delete();
        return redirect()->route('admin.carmodels.index');
    }
}
