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
            max-width: 50px;
        }

        .wrap{
            display: flex;
            flex-direction: column;
            align-items: center;
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
    margin: 0 auto;
}

button{
    margin: 2px;
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
            @foreach ($genres as $genre)
            <div class="wrap">
                <a href="/movies?genre={{ $genre->label }}"><h3>{{ $genre->label }}</h3></a>
            </div>
                @endforeach                
        </div>
    </div>
</body>
</html>
