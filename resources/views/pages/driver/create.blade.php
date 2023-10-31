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


@endsection
