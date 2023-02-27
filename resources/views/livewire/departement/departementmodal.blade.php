{{-- Add Departement --}}
<div wire:ignore.self class="modal fade" id="adddepartement">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire d'ajout d'un Departement</h4>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="saveDepartement">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nom Departement</label>
                        <input type="text" wire:model="nom" class="form-control">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Statut</label>
                        <select wire:model="statut" class="form-control">
                            <option value=""></option>
                            <option value="0">Fermer</option>
                            <option value="1">Non Fermer</option>
                        </select>
                         @error('statut')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click="closeModal" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregister</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



{{-- Edit Agence --}}
<div wire:ignore.self class="modal fade" id="editdepartement">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulaire de modification d'un Departement</h4>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateDepartement">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nom Departement</label>
                        <input type="text" wire:model="nom" class="form-control">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Statut</label>
                        <select wire:model="statut" class="form-control">
                            <option value=""></option>
                            <option value="0">Fermer</option>
                            <option value="1">Non Fermer</option>
                        </select>
                         @error('statut')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click="closeModal" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Mettre a jour</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


{{-- Delete Agence --}}
<div wire:ignore.self class="modal fade" id="deletedepartement">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppession d'une agence</h4>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="destroyDepartement">
                <div class="modal-body">
                    <p>Etes-vous de vouloir supprimer ce Departement</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click="closeModal" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>