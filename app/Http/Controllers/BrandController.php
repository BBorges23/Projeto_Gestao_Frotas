<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class  BrandController extends Controller
{
    /**
     * Mensagens de validação e regras para a marca.
     */
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'min' => 'Marca tem de estar entre 3 e 255 carateres',
        'max' => 'Marca tem de estar entre 3 e 255 carateres'

    ];

    protected $rules = [
        'name'=>'required|min:3|max:255',
    ];

    /**
     * Pesquisa marcas com base num campo de pesquisa fornecido.
     */
    public function pesquisar(Request $request){
        $pesquisa = $request->input('campo_de_pesquisa');

        if (empty($pesquisa)) {
            return redirect()->route(auth()->user()->getTypeUser().'.brands.index');
        }

        $resultados = Brand::where('name', 'like', '%'.$pesquisa.'%')->get();

        return view('pages.brand.index', compact('resultados'));
    }

    /**
     * Exibe uma lista de marcas paginada.
     */
    public function index()
    {
        $brands = Brand::paginate(16);

        return view('pages.brand.index', ['brands'=>$brands]);
    }

    /**
     * Exibe o formulário para criar uma nova marca.
     */
    public function create()
    {
        return view('pages.brand.create');
    }

    /**
     * Armazena uma nova marca na base de dados.
     */
    public function store(Request $request)
    {
        $dados=$request->validate($this->rules, $this->msg);
        $brand = new Brand($dados);
        $brand->save();
        return redirect()->route('admin.brands.show', $brand);
    }

    /**
     * Exibe os detalhes de uma marca específica.
     */
    public function show(Brand $brand)
    {

        return view('pages.brand.show', ['brand' => $brand]);

    }

    /**
     * Exibe o formulário para editar uma marca específica.
     */
    public function edit(Brand $brand)
    {
        return view('pages.brand.edit', ['brand'=>$brand]);
    }

    /**
     * Atualiza as informações de uma marca no banco de dados.
     */
    public function update(Request $request, Brand $brand)
    {
        $dados = $request->validate($this->rules, $this->msg);
        $brand->update($dados);
        $brand->save();
        return redirect()->route('admin.brands.show',['brand'=>$brand]);
    }

    /**
     * Remove uma marca específica do banco de dados.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index');
    }
}
