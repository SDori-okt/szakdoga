<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Kezdőlap - ShareOn - Fájlmegosztás tanároknak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Tailwind-->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.2/dist/full.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom -->
    <link rel="stylesheet" href="css/home.css">

    <script>
        const nope = () => {
            document.getElementById("share").classList.add("invisible");
        }

        const share = (file, ext) => {
            document.getElementById("share").classList.remove("invisible");
            document.getElementById("megosztando").innerHTML = file + "." + ext;
        }

        const copy = () => {
            let copyText = document.getElementById("megosztURL").value;
            navigator.clipboard.writeText(copyText);
            document.getElementById("megosztURL").value = "";
        }
    </script>
</head>
<body>

@include('menu')
@include('alert')

<div class="container w-50 min-vh-100">
    <h2 class="fs-1 pt-5 pb-3">Keresés</h2>

    <div class="bg-white p-3 shadow-md">
        <p>Az alábbi űrlapmezők kitöltésével szűkítheted a keresésed.</p>
        <form action="{{ route('search') }}"
              method="post"
              class="d-flex flex-column justify-content-center gap-2"
              enctype="multipart/form-data">
            @csrf
            <input
                type="text"
                id="cim"
                class="w-100 p-3 rounded-0 border-bottom"
                placeholder="Cím"
                name="title"
            />
            <input
                type="text"
                id="tantargy"
                class="w-100 p-3 rounded-0 border-bottom"
                placeholder="Tantárgy"
                name="subject"
            />
            <input
                type="text"
                id="temakor"
                class="w-100 p-3 rounded-0 border-bottom"
                placeholder="Témakör"
                name="topic"
            />
            <input
                type="text"
                id="evfolyam"
                class="w-100 p-3 rounded-0 border-bottom"
                placeholder="Évfolyam"
                name="grade"
            />
            <span class="border-bottom">
                <label for="nehezseg" class="w-25 text-center">Nehézségi szint</label>
                <input
                    type="number"
                    min="1" max="3"
                    id="nehezseg"
                    class="w-75 p-3 rounded-0"
                    name="difficulty_level"
                />
            </span>
            <input type="submit" value="Keres" class="w-25 align-self-center p-3 btn btn-info">
        </form>
    </div>

    @if(isset($results))
        @if ($results->isNotEmpty())
            <div id="eredmeny" class="mt-3">
                <h2>Keresési eredmények</h2>

                <table class="table table-striped table-hover">
                    <thead class="text-center">
                    <tr>
                        <th>Fájlnév</th>
                        <th>Típus</th>
                        <th>Szerző</th>
                        <th>Utolsó megtekintés</th>
                        <th>Eszközök</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td class="text-center text-wrap">{{$result->title}}</td>
                            <td class="text-center">{{$result->type}}</td>
                            <td class="text-center">{{$result->user_id}}</td>
                            <td class="text-center">{{$result->created_at}}</td>
                            <td class="text-center">
                                <span class="fa fa-download text-success cursor-pointer" title="Letöltés"></span>
                                <span class="fa fa-share-alt text-primary cursor-pointer"
                                      title="Megosztás" onclick="share('Mintafájl','PDF')">
                            </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        @endif
    @endif

    <div id="share"
         class="invisible z-3 position-fixed bottom-50 w-50 h-25 shadow-lg
         d-flex gap-2 align-items-center justify-content-start p-1 flex-column bg-white rounded-1">
        <span class="fa fa-close align-self-end fs-3 hover:text-info" onclick="nope()"></span>
        <h2 class="fs-2">Megosztod a következő fájlt?</h2>
        <p id="megosztando">XXXfájlnév</p>
        <div class="w-100 text-center">
            <label>URL:</label>
            <input
                class="w-75 border-bottom"
                type="text"
                id="megosztURL"
            />
            <button onclick="copy()" class="fa fa-copy"></button>
        </div>
    </div>


</div>

@include("footer")

</body>
</html>
<?php
