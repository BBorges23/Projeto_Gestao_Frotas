<div>
    <h1>Editar Marca</h1>

    <form class="form-custom" method="POST" action="{{ route('admin.brands.update', ['brand' => $brand]) }}">
        @csrf
        @method('PUT')

        <label for="name">Nome da Marca:</label>
        <input type="text" id="name" name="name" value="{{ $brand->name }}" required>

        <button type="submit" class="btn btn-primary">Atualizar Marca</button>
    </form>
</div>
