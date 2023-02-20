<div>
    @include('livewire.materiel.materielmodal')
    <section class="content">
        <h2 class="ml-2">Materiels</h2>
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
                <div class="col-md-4">
                    <label>Selectionnez le mois</label>
                    <input type="month" wire:model="datemois" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Materiels</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addMateriel">
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
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Marque</th>
                                        <th class="text-center">Model</th>
                                        <th class="text-center">Serie</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Date Entrer</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($materiels as $materiel)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td class="text-center">{{ $materiel->code }}</td>
                                            <td class="text-center">{{ $materiel->marque }}</td>
                                            <td class="text-center">{{ $materiel->model }}</td>
                                            <td class="text-center">{{ $materiel->serie }}</td>
                                            <td class="text-center">{{ $materiel->type->libelle }}</td>
                                            <td class="text-center">{{ $materiel->date_entre }}</td>
                                            <td class="text-center"><button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteMaterielmodal"
                                                    wire:click="deleteMateriel({{ $materiel->id }})"><i
                                                        class="fa fa-trash"></i></button></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Pas d'Agence pour le moment</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="py-2">
                                {{ $materiels->links() }}
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
