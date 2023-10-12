<div>
    <h1>Detalhes da Marca</h1>

    <p><strong>ID:</strong> {{ $brand->id }}</p>
    <p><strong>Nome:</strong> {{ $brand->name }}</p>
    <p><strong>Criado em:</strong> {{ $brand->created_at }}</p>
    <p><strong>Atualizado em:</strong> {{ $brand->updated_at }}</p>

    <a href="{{ route('admin.brands.index') }}" class="btn btn-primary">Voltar para a lista de Marcas</a>
</div>
