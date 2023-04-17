<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Belépés</title>
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

    <!-- Tailwind.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.2/dist/full.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/dropdown.css">

    <!--Custom JS -->
    <script src="js/filter.js"></script>
</head>
<body>
<div class="hero min-h-screen backdrop-blur-3xl text-white">
    <div class="hero-content sm:flex-col flex-row w-full justify-content-around">
        <div class="text-center lg:text-left flex-col flex-3">
            <img class="mx-auto" src="images/logo.svg" alt="ShareOn" title="ShareOn">
            <h2 class="text-3xl mt-3 font-bold">Üdvözöllek az oldalon!</h2>
            <p class="py-6">Ne maradj le a számos érdekes és hasznos dologról, ami bent vár!</p>
        </div>
        <div class="card flex-shrink-0 w-full max-w-sm shadow-1xl bg-base-100 flex-1">
            <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body text-center gap-3 text-gray-800">
                    <div class="w-full">
                        <input
                            type="text"
                            placeholder="Felhasználónév"
                            class="loginfield"
                            id="username"
                            name="username"
                        />
                    </div>
                    <div class="w-full">
                        <input
                            type="password"
                            placeholder="Jelszó"
                            class="loginfield"
                            id="password"
                            name="password"
                        />
                    </div>
                    <div class="dropdown w-full">
                        <button
                            onclick="institutionList()"
                            class="dropbtn btn"
                            id="institute"
                            style="background-color: #008808"
                            type="button">
                            Intézmény
                        </button>
                        <div id="institutionList" class="dropdown-content">
                            <input
                                type="text"
                                placeholder="Keresés..."
                                id="input"
                                onkeyup="filterFunction()">
                            @foreach($institution as $i)
                                <div class="option"
                                     onmouseover="selectInstitution('{{$i['name']}}', '{{$i['instituteCode']}}')">
                                    {{$i['name']}}
                                </div>
                            @endforeach
                        </div>
                        <input
                            hidden
                            type="text"
                            id="institution"
                            name="institution"
                        >
                    </div>
                    <p class="w-full text-center"><a href="#" class="label-text-alt link link-hover">Elfelejtetted a
                            jelszót?</a></p>
                    <div class="w-full mt-3">
                        <button type="submit" class="btn btn-info enter">Belépés</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="bg-neutral text-neutral-content">
    <div class="footer p-10">
        <div class="grid-cols-1">
            <img src="images/logo.svg" alt="ShareOn" class="w-24">
            <p class="w-100">
                Keress, találj, értékelj, alkoss és ossz meg! Együtt könyebb!
                <br>
                Ne többet dolgozz, hanem okosabban!
            </p>
        </div>
        <div class="col-sm-3">
            <span class="footer-title">Oldaltérkép</span>
            <div class="grid grid-flow-col gap-4">
                <ul>
                    <li><a href="#">Adatkezelési tájékoztató</a></li>
                    <li><a href="#">Süti nyilatkozat</a></li>
                    <li><a href="#">Impresszum</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <span class="footer-title">Dokumentumok</span>
            <div class="grid grid-flow-col gap-4">
                <ul>
                    <li><a href="#">Adatkezelési tájékoztató</a></li>
                    <li><a href="#">Süti nyilatkozat</a></li>
                    <li><a href="#">Impresszum</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <span class="footer-title">Social</span>
            <div class="grid grid-flow-col gap-4">
                <span class="fa fa-facebook"></span>
                <span class="fa fa-instagram"></span>
                <span class="fa fa-twitter"></span>
            </div>
        </div>
    </div>
    <div class="text-sm px-10 text-neutral-content">
        <p class="py-3 border-t-2 border-white">2023 <span class="fa fa-copyright"></span> ShareOn. Design: Stencinger
            Dóra</p>
    </div>
</footer>
</body>
</html>
