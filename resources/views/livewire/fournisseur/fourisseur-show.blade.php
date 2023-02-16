<div>
    @include('livewire.fournisseur.fournisseurmodal')
    <section class="content">
        <h2 class="ml-2">Fournisseurs</h2>
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
                            <h3 class="card-title">Fournisseurs</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addFrs">
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
                                        <th class="text-center">status</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($fournisseurs as $fournisseur)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td class="text-center">{{ $fournisseur->nom }}</td>
                                            <td class="text-center">
                                                @if ($fournisseur->status == '1')
                                                    <span class="btn btn-success btn-sm">Activer</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Desactiver</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><button type="button"
                                                    wire:click="editFournisseur({{ $fournisseur->id }})" class="btn btn-primary"
                                                    data-toggle="modal" data-target="#editFrs"><i
                                                        class="fa fa-edit"></i></button></td>
                                            <td class="text-center">
                                                <button type="button" wire:click="deleteFournisseur({{ $fournisseur->id }})"
                                                    class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteFrs"><i class="fa fa-trash"></i>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Pas de Fournisseurs pour le moment</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="py-2">
                                {{ $fournisseurs->links() }}
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
