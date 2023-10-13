<div>

    @if($errors->any())
        {{--Mensagem de erro do topo--}}
        <div class="row p-2">
            <div class="alert alert-danger" role="alert">
                Verifique os dados inseridos
            </div>
        </div>
    @endif

    <!-- Formulário para criar um novo registro -->
    <h1>Criar Novo Motorista</h1>
    <form class="form-custom" method="POST" action="{{ route('admin.drivers.store') }}">
        @csrf
        <table>
            <tr>
                <th>Nome</th>
                <td>
                    <input type="text" name="name" value="{{ old('name') }}">
                </td>
            </tr>
            <tr>
                <th>NIF</th>
                <td>
                    <input type="text" name="nif" value="{{ old('nif') }}">
                </td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td>
                    <input type="text" name="email" value="{{ old('email') }}">
                </td>
            </tr>
            <tr>
                <th>Contato</th>
                <td>
                    <input type="text" name="phone" value="{{ old('phone') }}">
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Criar Motorista</button>
    </form>
</div>

</body>
</html>
