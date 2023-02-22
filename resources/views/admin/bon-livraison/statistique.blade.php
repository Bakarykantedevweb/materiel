@extends('layouts.admin')
@section('title', 'Bon Livraison Statistique')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h2 class="ml-2">Statistiques des Materiels</h2>
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon fas fa-check"></i> {{ $message }}
                </div>
            @endif
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('/statistiques-agences') }}"><h3>Agences</h3></a>
                        </div>
                        <div class="card-body">
                            <p>Statistiques des Materiels par Agence</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('/statistiques-departements') }}"><h3>Departements</h3></a>
                        </div>
                        <div class="card-body">
                            <p>Statistiques des Materiels par Departement</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        </div>
    </section>

    <!-- /.content -->
@endsection
