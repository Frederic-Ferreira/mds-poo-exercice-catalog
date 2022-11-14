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
    margin: 0 auto;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>

        <div class="wrapper">
            @foreach ($movies as $movie)
            <div class="wrap">
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
                @endforeach
                <div class="buttons">
                {{ $movies->links() }}
                </div>
                
        </div>
    </div>
</body>
</html>
