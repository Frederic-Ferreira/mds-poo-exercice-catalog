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

    </style>

</head>
<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
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

        <div class="wrapper">
            <h1>{{ $movie->originalTitle }}</h1>
            <div>
                <a href="/movies/{{ $movie->id }}">
                    <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                </a>
            </div>
            <div class="space-between">
                <h4>Année de sortie : {{ $movie->startYear }}</h4>
                <h4>Durée : {{ $movie->runtimeMinutes }}min</h4>
            </div>
            <h2>Résumé :</h2>
            <p>{{ $movie->plot }}</p>
        </div>
    </div>
</body>
</html>
