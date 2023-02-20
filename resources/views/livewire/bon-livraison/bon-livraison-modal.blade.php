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
                                    @foreach ($departements as $dep)
                                        <option value="{{ $dep->id }}">{{ $dep->nom }}</option>
                                    @endforeach
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


{{-- Detail Bon Livraison --}}
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Bon Livraison</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 class="text-center">DECHARGE SUITE A LA RECEPTION</h2>
                    <h2 class="text-center">DES OUTILS DE TRAVAIL DE LA BIM S.A.</h2>
                    <b>Date:</b>
                    <br><br>
                    <p>Je, M.<b>Bakary Kante</b>, soussigné, reconnais que:</p>
                    <ul>
                        <li>Je dois utiliser les outils de travail qui m'ont été affectés, pour la réalisation des
                            fonctions dont je serai en charge, exclusivement;</li>
                        <br>
                        <li>J'ai reçu les outils suivants en bon état, et m'engage à les préserver en bon état pendant
                            l'exercice de mes fonctions</li>
                        <br>
                        <div class="container-fluid">
                            <ul>
                                <li>
                                    Je dois utiliser les outils de travail qui m'ont ete affectés, pour la realisation
                                    des
                                    fonctions dont <br> je serai en charge, exclusivement;
                                </li>
                                <br>
                                <li>
                                    j'ai reçu l'outil suivant en bon etat, et m'engage à le preserver en bon état
                                    pendant
                                    l'exercice <br> de mes fonction
                                </li>
                                <br>
                                <li class="ml-4">
                                    HP Color laser jet pro MFP m183fw
                                </li>
                            </ul>
                        </div>
                    </ul>
                    <br><br>
                    <div class="ml-10">
                        <b>Signature du collaborateur</b><br>
                        <b class="ml-3">Lu et Apprové</b><br><br><br><br>
                        M.Bakary Kante
                    </div>
                </div>
                {{-- <h4 class="text-center">DECHARGE SUITE A LA RECEPTION</h4>
                <h4 class="text-center">DES OUTILS DE TRAVAIL DE LA BIM S.A</h4>
                <b>Date: </b>
                <div class="mt-3">
                    Je, M.Bakary Kante, soussigné, reconnais que:
                    <div class="container mt-3">
                        <ul>
                            <li>
                                Je dois utiliser les outils de travail qui m'ont ete affectés, pour la realisation des
                                fonctions dont <br> je serai en charge, exclusivement;
                            </li>
                            <br>
                            <li>
                                j'ai reçu l'outil suivant en bon etat, et m'engage à le preserver en bon état pendant
                                l'exercice <br> de mes fonction
                            </li>
                            <br>
                            <li class="ml-4">
                                HP Color laser jet pro MFP m183fw
                            </li>
                        </ul>
                        <div class="float-end">
                            <b>Signature de collaborateur <br> Lu et Approuve</b>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
