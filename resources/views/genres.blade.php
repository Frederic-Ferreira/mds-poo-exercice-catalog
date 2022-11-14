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
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        <button>
        <a href="/">Accueil</a>
        </button>
        <button>
        <a href="/movie/random">Trouver un film au hasard</a>
        </button>
        <div><button>
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
            @foreach ($genres as $genre)
            <div class="wrap">
                <h3>{{ $genre->label }}</h3>
            </div>
                @endforeach                
        </div>
    </div>
</body>
</html>
