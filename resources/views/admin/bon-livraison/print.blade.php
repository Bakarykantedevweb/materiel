<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bon Livraison</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <br>
    <div class="container mt-3">
        <h2 class="text-center">DECHARGE SUITE A LA RECEPTION</h2>
        <h2 class="text-center">DES OUTILS DE TRAVAIL DE LA BIM S.A.</h2>
        <b>Date: {{ date('d-F-Y', strtotime($materielsorti->date_sorti)) }}</b>
        <br><br>
        <p>Je, M.<b>{{ $materielsorti->prenom . ' ' . $materielsorti->nom }}
                ({{ $materielsorti->agence->nom }})({{ $materielsorti->departement->nom }})</b>, soussigné, reconnais
            que:</p>
        <ul>
            <li>Je dois utiliser les outils de travail qui m'ont été affectés, pour la réalisation des
                fonctions dont je serai en charge, exclusivement;</li>
            <br>
            <li>J'ai reçu les outils suivants en bon état, et m'engage à les préserver en bon état pendant
                l'exercice de mes fonctions</li>
            <br>
            <div class="container-fluid">
                <ul>
                    @foreach ($detailBonMateriels as $detailBonMateriel)
                        @php
                            $pivot = DB::table('bon_sorti_materiel')
                                ->where('bon_sorti_id', $materielsorti->id)
                                ->where('materiel_id', $detailBonMateriel->id)
                                ->first();
                        @endphp
                        <li class="ml-4">
                            {{ $detailBonMateriel->marque . ' ' . $detailBonMateriel->model }} * {{ $pivot->quantite }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </ul>
        <br><br>
        <div class="float-end">
            <b>Signature du collaborateur</b><br>
            <b class="ml-3">Lu et Apprové</b><br><br><br><br>
            M.{{ $materielsorti->prenom . ' ' . $materielsorti->nom }}
        </div>
    </div>
</body>

</html>
