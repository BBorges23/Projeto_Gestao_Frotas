@extends('templates.main')

@section('title','Dashboard Admin da Gestão de Frotas')

@section('content')
    {{--
           Elementos retidados de https://github.com/ColorlibHQ/AdminLTE/tree/master
           Demo: https://adminlte.io/themes/v3/index.html
       --}}

    <div class="row">

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-large">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Shadows</span>
                    <span class="info-box-number">None</span>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-large">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Shadows</span>
                    <span class="info-box-number">None</span>
                </div>

            </div>
        </div>

    </div>

    <div class="row" >
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-large">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Shadows</span>
                    <span class="info-box-number">None</span>
                </div>

            </div>
        </div>

    </div>



    {{--Row tabelas--}}
    <div class="row">
        {{--Últimas Requisições--}}
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Últimas requisições</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Obra</th>
                            <th>User</th>
                            <th style="width: 40px">Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1.</td>
                            <td>O Senhor dos aneis</td>
                            <td>
                                Joaquim Manuel
                            </td>
                            <td><span class="badge bg-danger">Fechado</span></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Avolta ao mundo</td>
                            <td>
                                Vitor Helário
                            </td>
                            <td><span class="badge bg-success">Aberto</span></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <p>Footer</p>
                </div>

            </div>
        </div>

        {{--Últimas Requisições--}}

    </div>




    <div class="row">
        <div class="col-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header h2 bg-warning">
                    Autor em Destaque
                </div>
                <div class="card-body">
                    <h3>Joquim Carrapato</h3>
                    <p> This card uses Bootstrap's default styling with no utility classes added. Global
                        styles are the only things modifying the look and feel of this default card example.
                    </p>

                    <div class="row mt-2 ">
                        <h5 class="text-dark-emphasis fw-semibold">Obras do Autor</h5>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Obra 1</li>
                            <li class="list-group-item">Obra 2</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
