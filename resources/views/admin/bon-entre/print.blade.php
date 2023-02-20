<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Bon Reception</title>
</head>

<body>
    <br>
    <div class="container mt-3">
        <h2 class="text-center">Bordereau de reception</h2>
        <div class="row p-1">
            <div class="col-xl-6">
                <div class="col-md-11 border border-2 rounded p-2">
                    <span>Numéro : {{ $bonDetail->numero }}</span>
                </div><br>
                <div class="col-md-11 border border-2 rounded p-2">
                    <span>Date: {{ $bonDetail->date_entre }}</span>
                </div><br>
                <div class="col-md-11 border border-2 rounded p-2">
                    <span>Fournisseur: {{ $bonDetail->fournisseur->nom }}</span>
                </div>
            </div>
        </div>
        <br>
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
                @foreach ($detailBonMateriels as $detailBonMateriel)
                    <tr>
                        <td>{{ $detailBonMateriel->code }}</td>
                        <td>
                            {{ $detailBonMateriel->type->libelle . ' ' . $detailBonMateriel->marque . ' ' . $detailBonMateriel->model . ' ' . $detailBonMateriel->description }}
                        </td>
                        @php
                            $pivot = DB::table('bon_entre_materiel')
                                ->where('bon_entre_id', $bonDetail->id)
                                ->where('materiel_id', $detailBonMateriel->id)
                                ->first();
                        @endphp

                        <td>{{ $pivot->quantite }}</td>
                        <td>Unité</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
