<div>
    @include('livewire.bon-entre.bon-entre-modal')
    <section class="content">
        <h2 class="ml-2">Bon de Reception</h2>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bon de reception</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fas fa-plus"></i> Ajouter
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Numero</th>
                                        <th class="text-center">Fourisseur</th>
                                        <th class="text-center">Libelle</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($bonentres as $bonentre)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td class="text-center">{{ $bonentre->numero }}</td>
                                            <td class="text-center">{{ $bonentre->fournisseur->nom }}</td>
                                            <td class="text-center">{{ $bonentre->description }}</td>
                                            <td class="text-center">{{ $bonentre->date_entre }}</td>
                                            <td class="text-center"><button type="button"
                                                data-toggle="modal" data-target="#modal-xl"
                                                wire:click="detailBon({{ $bonentre->id }})"
                                                 class="btn btn-info"><i class="fa fa-info"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Pas d'Agence pour le moment</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="py-2">
                                {{-- {{ $agences->links() }} --}}
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
