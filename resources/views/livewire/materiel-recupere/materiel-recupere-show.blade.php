<div>
    @include('livewire.materiel-recupere.materielrecuperemodal')
    <section class="content">
        <h2 class="ml-2">Materiels Recuperés</h2>
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
        <div class="container ml-1">
            <div class="row">
                <div class="container ml-1">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Selectionnez le mois</label>
                            <input type="month" wire:model="mois" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Materiels Recuperés</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addMaterielRecupere">
                                    <i class="fa fa-plus"></i>Ajouter
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Departement</th>
                                        <th class="text-center">Agence</th>
                                        <th class="text-center">Marque</th>
                                        <th class="text-center">Model</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Etat</th>
                                        <th class="text-center">Date Entrer</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($materielRecupere as $materiel)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td class="text-center">{{ $materiel->departement->nom }}</td>
                                            <td class="text-center">{{ $materiel->agence->nom }}</td>
                                            <td class="text-center">{{ $materiel->marque }}</td>
                                            <td class="text-center">{{ $materiel->modele }}</td>
                                            <td class="text-center">{{ $materiel->type->libelle }}</td>
                                            <td class="text-center">{{ $materiel->etat }}</td>
                                            <td class="text-center">{{ $materiel->date_entre }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editMaterielRecuperemodal"
                                                    wire:click="editMaterielRecupere({{ $materiel->id }})"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">Pas d'Agence pour le moment</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="py-2">
                                {{ $materielRecupere->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>


    </section>
</div>
