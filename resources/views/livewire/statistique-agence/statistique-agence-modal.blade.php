@if ($this->detailBons != '')
    <div wire:ignore.self class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Details Materiels</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Materiels</th>
                                    <th>Quantite</th>
                                    <th>Date Sortie</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    $pivotData = DB::table('bon_sorti_materiel')
                                        ->whereIn('materiel_id', $detailBonMateriels->pluck('id'))
                                        ->whereIn('bon_sorti_id', $detailBons->pluck('id'))
                                        ->get()
                                        ->keyBy(function ($item) {
                                            return $item->materiel_id . '-' . $item->bon_sorti_id;
                                        });
                                @endphp
                                @foreach ($detailBons as $detailBon)
                                    @foreach ($detailBonMateriels as $detailBonMateriel)
                                        @php
                                            $key = $detailBonMateriel->id . '-' . $detailBon->id;
                                        @endphp
                                        <tr>
                                            <td>{{ $detailBonMateriel->type->libelle }}</td>
                                            <td>{{ $detailBonMateriel->marque . ' ' . $detailBonMateriel->model }}</td>
                                            <td>{{ isset($pivotData[$key]) ? $pivotData[$key]->quantite : 0 }}</td>
                                            <td>{{ $detailBon->date_sorti }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach --}}
                                @foreach ($detailBons as $detailBon)
                                    @foreach ($detailBonMateriels as $detailBonMateriel)
                                        @php
                                            $pivot = DB::table('bon_sorti_materiel')
                                                ->where('bon_sorti_id', $detailBon->id)
                                                ->where('materiel_id', $detailBonMateriel->id)
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $detailBonMateriel->type->libelle }}</td>
                                            <td>{{ $detailBonMateriel->marque . ' ' . $detailBonMateriel->model }}</td>
                                            <td>{{ $pivot->quantite }}</td>
                                            <td>{{ $detailBon->date_sorti }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endif
