<div>
    @include('livewire.materiel-sorti.materielsortimodal')
    <section class="content">
        <h2 class="ml-2">Materiels Sortis</h2>
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
                    <input type="month" wire:model="date" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Materiels Sortis</h3>
                            <div class="card-tools">
                                <a href="{{ url('materiels-sortis/create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Ajouter
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table id="example1" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Departement</th>
                                        <th class="text-center">Agence</th>
                                        <th class="text-center">Materiels</th>
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Prenom</th>
                                        <th class="text-center">Date Sortie</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($materielSorti as $materiel)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            @if ($materiel->departement_id)
                                                <td class="text-center">{{ $materiel->departement->nom }}</td>
                                            @else
                                                <td><span>Pas de departement</span></td>
                                            @endif
                                            <td class="text-center">{{ $materiel->agence->nom }}</td>
                                            <td class="text-center">
                                                @php
                                                    $hobbies = json_decode($materiel->materiel_id);
                                                @endphp
                                                @foreach ($hobbies as $hobby)
                                                    <span class="btn-sm btn btn-primary">{{ $hobby }}</span>
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{ $materiel->nom }}</td>
                                            <td class="text-center">{{ $materiel->prenom }}</td>
                                            <td class="text-center">{{ $materiel->date_sorti }}</td>
                                            <td class="text-center"><a
                                                    href="{{ url('materiels-sortis/' . $materiel->id . '/edit') }}"
                                                    class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                            <td class="text-center"><button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteMaterielSortimodal"
                                                    wire:click="deleteMaterielSorti({{ $materiel->id }})"><i
                                                        class="fa fa-trash"></i></button></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">Pas de Materiel Sorti pour le moment
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="py-2">
                                {{ $materielSorti->links() }}
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
