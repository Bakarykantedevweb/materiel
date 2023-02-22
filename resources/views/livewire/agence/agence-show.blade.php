<div>
    @include('livewire.agence.agencemodal')
    <section class="content">
        <h2 class="ml-2">Agences</h2>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Agences</h3>
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
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Statut</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($agences as $agence)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td class="text-center">{{ $agence->nom }}</td>
                                            <td class="text-center">
                                                @if ($agence->statut == '1')
                                                    <span class="btn btn-success">Non Fermer</span>
                                                @else
                                                    <span class="btn btn-danger">Fermer</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><button type="button"
                                                    wire:click="editAgence({{ $agence->id }})" class="btn btn-primary"
                                                    data-toggle="modal" data-target="#modal-default1"><i
                                                        class="fa fa-edit"></i></button></td>
                                            <td class="text-center">
                                                <button type="button" wire:click="deleteAgence({{ $agence->id }})"
                                                    class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-default2"><i class="fa fa-trash"></i>
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
                                {{ $agences->links() }}
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
