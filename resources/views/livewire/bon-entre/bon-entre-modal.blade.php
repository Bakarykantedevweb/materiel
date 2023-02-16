{{-- Add Bon --}}
<div wire:ignore.self class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire</h4>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="saveBon">
                <div class="modal-body">
                    <button type="button" wire:click="addInput" class="btn btn-primary">Ajouter Materiel</button><br>
                    <div class="mb-3">
                        <label for="">Date</label>
                        <input type="date" wire:model="date" class="form-control">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea wire:model="description" class="form-control" cols="30" rows="2"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Fournisseur</label>
                        <select wire:model="fournisseur" class="form-control">
                            <option value=""></option>
                            @foreach ($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                            @endforeach
                        </select>
                        @error('fournisseur')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (is_array($champs))
                        @foreach ($champs as $champ)
                            <div class="row mb-3">
                                <div class="col-md-7">
                                    <select class="form-control" wire:model="materiel_id.{{ $loop->index }}">
                                        <option value="">Choisir</option>
                                        @foreach ($materiels as $materiel)
                                            <option value="{{ $materiel->id }}">
                                                {{ $materiel->marque . ' ' . $materiel->model }}</option>
                                        @endforeach
                                    </select>
                                    @error('materiel_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <input type="number" wire:model="quantite.{{ $loop->index }}"
                                        placeholder="Quantite" class="form-control">
                                    @error('quantite')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 py-1">
                                    <button type="button" wire:click="deleteInput({{ $champ }})"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click="closeModal" class="btn btn-default"
                        data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregister</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- Details Bon --}}
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Details Bordereau de Livraison</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 class="text-center">Bordereau de livraison</h2>
                <div class="row p-1">
                    <div class="col-xl-6">
                            <div class="col-md-11 border border-2 rounded p-2">
                                <span>Numéro</span>
                            </div><br>
                            <div class="col-md-11 border border-2 rounded p-2">
                                <span>Date</span>
                            </div><br>
                            <div class="col-md-11 border border-2 rounded p-2">
                                <span>Reference</span>
                            </div>
                    </div>
                    <div class="col-xl-6">
                        <textarea readonly name="" id="" cols="20" rows="7" class="form-control">
                            Sommething here....
                        </textarea>
                    </div>
                </div>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Code</td>
                            <td>Description</td>
                            <td>Quantite</td>
                            <td>Unité</td>
                            <td>Observation</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Code</td>
                            <td>Description</td>
                            <td>Quantite</td>
                            <td>Unité</td>
                            <td>Observation</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Imprimer</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
