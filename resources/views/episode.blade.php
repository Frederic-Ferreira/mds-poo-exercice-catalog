<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="./../css/app.css" rel="stylesheet" />
    <style>

.container{
    display: flex;
    flex-direction: column;
    align-items: center;
}

.wrapper {
    width: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.space-between{
    width: 100%;
    display: flex;
    justify-content: space-between;
}
.nav{
    display: flex;
    gap: 10px;
}

    </style>

</head>
<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        <div class="nav">
        <button>
        <a href="/">Accueil</a>
        </button>
        <button>
        <a href="/genres">Genres de film</a>
        </button>
        <button>
        <a href="/movie/random">Trouver un film au hasard</a>
        </button>
        <button>
        <a href="/series/random">Trouver une série au hasard</a>
        </button>
        <button>
        <a href="/series">Liste des séries</a>
        </button>
        <button>
        <a href="/movies?order_by=startYear&order=desc">Films récents</a>
        </button>
        <button>
        <a href="/movies?order_by=startYear&order=asc">Films anciens</a>
        </button>
        <button>
        <a href="/movies?order_by=averageRating&order=desc">Meilleurs Films</a>
        </button>
        <button>
        <a href="/movies?order_by=averageRating&order=asc">Films moins biens notés</a>
        </button>  
        <button>
        <a href="/series?order_by=startYear&order=desc">Série récentes</a>
        </button>
        <button>
        <a href="/series?order_by=startYear&order=asc">Série anciennes</a>
        </button>
        <button>
        <a href="/series?order_by=averageRating&order=desc">Meilleures Série</a>
        </button>
        <button>
        <a href="/series?order_by=averageRating&order=asc">Série moins biens notés</a>
        </button>     
        </div>

        <div class="wrapper">
            <h1>{{ $episode->originalTitle }}</h1>
            <div>
                <a href="/series/{{ $serieId }}/season/{{ $episode->pivot->seasonNumber }}/episode/{{ $episode->pivot->episodeNumber }}">
                    <img src="{{ $episode->poster }}" alt="{{ $episode->primaryTitle }}">
                </a>
            </div>
            <div class="space-between">
                <h4>Année de sortie : {{ $episode->startYear }}</h4>
                <h4>Durée : {{ $episode->runtimeMinutes }}min</h4>
            </div>
            <h2>Résumé :</h2>
            <p>{{ $episode->plot }}</p>
        </div>
    </div>
</body>
</html>
