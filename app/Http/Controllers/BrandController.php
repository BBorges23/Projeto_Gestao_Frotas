<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class  BrandController extends Controller
{
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'min' => 'Marca tem de estar entre 3 e 255 carateres',
        'max' => 'Marca tem de estar entre 3 e 255 carateres'

    ];

    protected $rules = [
        'name'=>'required|min:3|max:255',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(16);

        return view('pages.brand.index', ['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados=$request->validate($this->rules, $this->msg);
        $brand = new Brand($dados);
        $brand->save();
        return redirect()->route('admin.brands.show', $brand);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {

        return view('pages.brand.show', ['brand' => $brand]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('pages.brand.edit', ['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $dados = $request->validate($this->rules, $this->msg);
        $brand->update($dados);
        $brand->save();
        return redirect()->route('admin.brands.show',['brand'=>$brand]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index');
    }
}
