@extends('index')
@section('title', 'Editar Motorista')

@section('content')
    <div>

        @if($errors->any())
            {{--Mensagem de erro do topo--}}
            <div class="row p-2">
                <div class="alert alert-danger" role="alert">
                    Verifique os dados inseridos
                </div>
            </div>
        @endif

        <form class="form-custom" method="POST" action="{{ route('admin.drivers.update', $driver->id) }}">
            @csrf
            @method('PUT')

            <table>
                <tr>
                    <th>Nome</th>
                    <td><input type="text" name="name" value="{{ $driver->user->name }} " disabled></td>
                    <div class="invalid-feedback"> @error('name') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>NIF</th>
                    <td><input type="text" name="nif" value="{{ $driver->nif }}"></td>
                    <div class="invalid-feedback">@error('nif') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td><input type="text" name="email" value="{{ $driver->user->email }} " disabled></td>
                    <div class="invalid-feedback"> @error('email') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>Contato</th>
                    <td><input type="text" name="phone" value="{{ $driver->phone }}"></td>
                    <div class="invalid-feedback">@error('phone') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td>
                        <select name="condition">
                            <option value="FERIAS">FERIAS</option>
                            <option value="BAIXA">BAIXA</option>
                            <option value="ATIVO">ATIVO</option>
                        </select>

                        @if(request('condition') === 'ATIVO')
                            <input hidden="" type="text" name="is_working" value="1">
                        @elseif(request('condition') === 'FERIAS')
                            <input hidden="" type="text" name="is_working" value="1">
                        @elseif(request('condition') === 'BAIXA')
                            <input hidden="" type="text" name="is_working" value="1">
                        @endif

                    </td>
                </tr>
                <div class="invalid-feedback">@error('condition') {{$message}} @enderror</div>
            </table><br />

            <button type="submit" class="btn btn-primary">Editar Motorista</button><br />
            <a class="btn btn-secondary" href="{{ route('admin.drivers.show',$driver->id) }}">Cancelar</a><br />
        </form>
    </div>
@endsection
