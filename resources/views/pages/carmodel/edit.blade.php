<div>
    <h1>Editar Modelo</h1>

    @if($errors->any())
        {{--Mensagem de erro do topo--}}
        <div class="row p-2">
            <div class="alert alert-danger" role="alert">
                Verifique os dados inseridos
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.carmodels.update', ['carmodel' => $carmodel->id]) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nome do Modelo:</label>
            <input type="text" name="name" id="name" value="{{ $carmodel->name }}">
            <div class="invalid-feedback">@error('name') {{$message}}  @enderror</div>
        </div>

        <div>
            <label for="brand_id">Marca:</label>
            <select name="brand_id" id="brand_id">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $brand->id === $carmodel->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">@error('brand_id') {{$message}} @enderror</div>
        </div>

        <div>
            <button type="submit">Atualizar Modelo</button>
        </div>
    </form>

    <a href="{{ route('admin.carmodels.index') }}">Voltar para a lista de modelos</a>
</div>
