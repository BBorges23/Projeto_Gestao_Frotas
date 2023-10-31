@extends('index')
@section('title', 'Motoristas')
@section('subtitle', ' -> Criar')
@section('content')
{{--    <div>--}}
{{--        @if($errors->any())--}}
{{--            <!-- Mensagem de erro no topo -->--}}
{{--            <div class="row p-2">--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    Verifique os dados inseridos--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form class="form-custom" method="POST" action="{{ route('admin.drivers.store') }}">--}}
{{--            @csrf--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <th>Nome</th>--}}
{{--                    <td>--}}
{{--                        <input type="text" name="name" value="{{ old('name') }}">--}}
{{--                        <div class="invalid-feedback">@error('name') {{$message}} @enderror</div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>NIF</th>--}}
{{--                    <td>--}}
{{--                        <input type="text" name="nif" value="{{ old('nif') }}">--}}
{{--                        <div class="invalid-feedback">@error('nif') {{$message}} @enderror</div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>E-mail</th>--}}
{{--                    <td>--}}
{{--                        <input type="text" name="email" value="{{ old('email') }}">--}}
{{--                        <div class="invalid-feedback">@error('email') {{$message}} @enderror</div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Contato</th>--}}
{{--                    <td>--}}
{{--                        <input type="text" name="phone" value="{{ old('phone') }}">--}}
{{--                        <div class="invalid-feedback">@error('phone') {{$message}} @enderror</div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            <!-- Adicione um campo de senha para o usuário -->--}}
{{--            <tr>--}}
{{--                <th>Senha</th>--}}
{{--                <td>--}}
{{--                    <input type="password" name="password" value="{{ old('password') }}">--}}
{{--                    <div class="invalid-feedback">@error('password') {{$message}} @enderror</div>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            </table>--}}
{{--            <button type="submit" class="btn btn-primary">Criar Motorista</button>--}}
{{--        </form>--}}
{{--    </div>--}}


    @component('components.create_form', [
    'route_create' => 'admin.drivers.store',
    'cor' => 'bg-success',
    'imagem' => 'images/pessoa.png',
    'nome' => 'Criar Motorista',
    'titulo1' => 'Nome',
    'tipo1' => 'text',
    'input_nome1' => 'name',
    'titulo2' => 'NIF',
    'tipo2' => 'text',
    'input_nome2' => 'nif',
    'titulo3' => 'E-mail',
    'tipo3' => 'text',
    'input_nome3' => 'email',
    'titulo4' => 'Password',
    'tipo4' => 'password',
    'input_nome4' => 'password',
    'titulo5' => 'Contacto',
    'tipo5' => 'text',
    'input_nome5' => 'phone',
    'cancelar' => 'admin.drivers.index'
    ])
    @endcomponent

@endsection
