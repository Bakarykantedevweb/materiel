<div>
     @include('livewire.statistique-departement.statistique-departement-modal')
    <section class="content">
        <h2 class="ml-2">Statistiques des Materiels par Departement</h2>
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
                @foreach ($departements as $departement)
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $departement->nom }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @php
                                    $nbr = 0;
                                @endphp
                                 @foreach ($departement->bon_sortis as $bon)
                                      @php
                                          foreach($bon->materiels  as $materiel)
                                          {
                                          $nbr += count(DB::table('bon_sorti_materiel')->where('materiel_id',$materiel->id)
                                                                                 ->where("bon_sorti_id",$bon->id)->get());
                                          }
                                      @endphp
                                @endforeach
                                <h4>Nombre de Materiels : {{ $nbr }}</h4>
                                 <button type="button" wire:click="detailSatistiqueDepartement({{ $departement->id }})" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
                                    <i class="fa fa-info"></i>
                                </button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
