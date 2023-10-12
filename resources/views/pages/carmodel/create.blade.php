<div>
    <h1>Criar Novo Modelo</h1>

    <form class="form-custom" method="POST" action="{{ route('admin.models.store') }}">
        @csrf

        <label for="name">Nome do Modelo:</label>
        <input type="text" id="name" name="name" required>

        <label for="brand_id">Selecione a Marca:</label>
        <select id="brand_id" name="brand_id" required>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Criar Modelo</button>
    </form>
</div>
