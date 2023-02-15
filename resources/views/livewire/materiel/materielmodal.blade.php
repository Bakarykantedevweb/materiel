{{-- Add Matereil --}}
<div wire:ignore.self class="modal fade" id="addMateriel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire d'ajout d'un Materiel </h4>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="saveMateriel">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Marque</label>
                                <input type="text" class="form-control" wire:model="marque">
                                @error('marque')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Model</label>
                                <input type="text" class="form-control" wire:model="model">
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Type Ordinateur</label>
                                <select class="form-control" wire:model="type">
                                    <option value=""></option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                                    @endforeach
                                </select>
                                @error('fournisseur')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Serie</label>
                                <input type="text" class="form-control" wire:model="serie">
                                @error('serie')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Date Entré</label>
                                <input type="date" class="form-control" wire:model="date_entre">
                                @error('date_entre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Etat</label>
                                <select wire:model="etat" class="form-control">
                                    <option value=""></option>
                                    <option value="0">En Panne</option>
                                    <option value="1">Bon Etat</option>
                                </select>
                                @error('etat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea wire:model="description" class="form-control" cols="30" rows="2"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" wire:click="closeModal"
                        data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


{{-- Edit Matereil --}}
<div wire:ignore.self class="modal fade" id="editMaterielmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire de modification d'un Materiel </h4>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateMateriel">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- <div class="form-group">
                                <label for="">Fournisseur</label>
                                <select class="form-control" wire:model="fournisseur">
                                    <option value=""></option>
                                    @foreach ($fournisseurs as $items)
                                        <option value="{{ $items->id }}">{{ $items->nom }}</option>
                                    @endforeach
                                </select>
                                @error('fournisseur')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="">Model</label>
                                <input type="text" class="form-control" wire:model="model">
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Quantite</label>
                                <input type="number" class="form-control" wire:model="quantite">
                                @error('quantite')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Type Ordinateur</label>
                                <select class="form-control" wire:model="fournisseur">
                                    <option value=""></option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                                    @endforeach
                                </select>
                                @error('fournisseur')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Marque</label>
                                <input type="text" class="form-control" wire:model="marque">
                                @error('marque')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Serie</label>
                                <input type="text" class="form-control" wire:model="serie">
                                @error('serie')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Date Entré</label>
                                <input type="date" class="form-control" wire:model="date_entre">
                                @error('date_entre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea wire:model="description" class="form-control" cols="30" rows="2"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" wire:click="closeModal"
                        data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



{{-- Delete Matereil --}}
<div wire:ignore.self class="modal fade" id="deleteMaterielmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire de modification d'un Materiel </h4>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="destroyMateriel">
                <div class="modal-body">
                    <h5 class="text-center">Etes-vous sur de vouloir supprimer ce Materiel</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="closeModal"
                        data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
