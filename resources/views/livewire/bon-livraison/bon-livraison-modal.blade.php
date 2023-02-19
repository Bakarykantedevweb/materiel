{{-- Add Bon Livraison --}}
<div wire:ignore.self class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire</h4>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="saveBonLivraison">
                <div class="modal-body">
                    <button type="button" wire:click="addInput" class="btn btn-primary">Ajouter Materiel</button>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" wire:model="nom">
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Agences</label>
                                <select wire:model="agence" class="form-control" style="width: 100%;">
                                    <option value=""></option>
                                    @foreach ($agences as $agence)
                                        <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                    @endforeach
                                </select>
                                @error('agence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Prenom</label>
                                <input type="text" class="form-control" wire:model="prenom">
                                @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Departements</label>
                                <select wire:model="departement" class="form-control">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                                @error('departement')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" wire:model="date_sorti">
                                @error('date_sorti')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (is_array($champs))
                                @foreach ($champs as $champ)
                                    <div class="row mb-3">
                                        <div class="col-md-7">
                                            <select class="form-control" wire:model="materiel_id.{{ $loop->index }}">
                                                <option value="">Choisir Materiel</option>
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
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
