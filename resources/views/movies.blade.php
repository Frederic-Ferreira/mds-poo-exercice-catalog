<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .wrapper{
            display: flex;
            column-gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .wrap{
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 300px;
        }

        .space-between{
    width: 100%;
    display: flex;
    justify-content: space-between;
}

p{
    overflow: hidden;
    position: relative;
    text-overflow: ellipsis;
    display:inline-block;
    max-width: 300px;
    max-height: 200px;
    text-overflow: clip;
}

.buttons{
    margin-top: 1rem;
    display: inline;
    margin: 0 auto;
}

button{
    margin: 2px;
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
        </div>

        <div class="wrapper">
            @foreach ($movies as $movie)
            <div class="wrap">
                <h1>{{ $movie->originalTitle }}</h1>
                <div>
                    <a href="/movie/{{ $movie->id }}">
                        <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                    </a>
                </div>
                <div class="space-between">
                <h4>Année de sortie : {{ $movie->startYear }}</h4>
                <h4>Note : {{ $movie->averageRating }}</h4>
                <h4>Durée : {{ $movie->runtimeMinutes }}min</h4>
            </div>
            <h2>Résumé :</h2>
            <p>{{ $movie->plot }}</p>
            </div>
                @endforeach
            </div>
            <div class="buttons">
                {{ $movies->links() }}
            </div>
            
    </div>
</body>
</html>
