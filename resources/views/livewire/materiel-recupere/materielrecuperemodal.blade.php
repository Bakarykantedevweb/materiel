<div wire:ignore.self class="modal fade" id="addMaterielRecupere">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire d'insertion d'un Materiel Recupere</h4>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="saveMaterielRecupere">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Departement</label>
                                <select class="form-control" wire:model="departement">
                                    <option value=""></option>
                                    @foreach ($departements as $items)
                                        <option value="{{ $items->id }}">{{ $items->nom }}</option>
                                    @endforeach
                                </select>
                                @error('departement')
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
                                <label for="">Etat</label>
                                <select class="form-control" id="change" wire:model="etat">
                                    <option value=""></option>
                                    <option value="Bon">Bon</option>
                                    <option value="En Panne">En Panne</option>
                                </select>
                                @error('etat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Agence</label>
                                <select class="form-control" wire:model="agence">
                                    <option value=""></option>
                                    @foreach ($agences as $agence)
                                        <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                    @endforeach
                                </select>
                                @error('agence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Modele</label>
                                <input type="text" class="form-control" wire:model="model">
                                @error('model')
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
                                <label for="">Type Materiel</label>
                                <select class="form-control" wire:model="type">
                                    <option value=""></option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description de l'etat du Maeriel Recupere</label>
                                <textarea wire:model="description" class="form-control" rows="2"></textarea>
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



<div wire:ignore.self class="modal fade" id="editMaterielRecuperemodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire de modification d'un Materiel Recupere</h4>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateMaterielRecupere">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Departement</label>
                                <select class="form-control" wire:model="departement">
                                    <option value=""></option>
                                    @foreach ($departements as $items)
                                        <option value="{{ $items->id }}">{{ $items->nom }}</option>
                                    @endforeach
                                </select>
                                @error('departement')
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
                                <label for="">Etat</label>
                                <select class="form-control" id="change" wire:model="etat">
                                    <option value=""></option>
                                    <option value="Bon">Bon</option>
                                    <option value="En Panne">En Panne</option>
                                </select>
                                @error('etat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Agence</label>
                                <select class="form-control" wire:model="agence">
                                    <option value=""></option>
                                    @foreach ($agences as $agence)
                                        <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                    @endforeach
                                </select>
                                @error('agence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Modele</label>
                                <input type="text" class="form-control" wire:model="model">
                                @error('model')
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
                                <label for="">Type Materiel</label>
                                <select class="form-control" wire:model="type">
                                    <option value=""></option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description de l'etat du Maeriel Recupere</label>
                                <textarea wire:model="description" class="form-control" rows="2"></textarea>
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



<div wire:ignore.self class="modal fade" id="deleteMaterielRecuperemodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire de Suppression d'un Materiel Recupere</h4>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="destroyMaterielRecupere">
                <div class="modal-body">
                    <h4 class="text-center">Etes vous sur je vouloir supprimer ce Materiel Recupere</h4>
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
