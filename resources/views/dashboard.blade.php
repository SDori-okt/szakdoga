<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Kezdőlap - ShareOn - Fájlmegosztás tanároknak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="idth=device-width,initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Tailwind-->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<!-- Menu -->
@include("menu");


<!-- Dashboard tile -->
<div class="container w-50">
    <h2 class="fs-1 pb-3">Statisztikád</h2>
    <div class="container p-0 d-md-flex gap-10 justify-content-between">
        <div class="w-50 shadow-md p-5 rounded-3 bg-danger d-flex flex-column align-items-center justify-content-center">
            <h2>Letöltések</h2>
            <p class="fs-1 fw-bold">44</p>
        </div>
        <div class="w-50 shadow-md p-5 rounded-3 bg-success d-flex flex-column align-items-center justify-content-center">
            <h2>Feltöltések</h2>
            <p class="fs-1 fw-bold">44</p>
        </div>
        <div class="w-50 shadow-md p-5 rounded-3 bg-warning d-flex flex-column align-items-center justify-content-center">
            <h2>Értékelés</h2>
            <p class="fs-1 fw-bold">4.4</p>
        </div>
    </div>
</div>



<!-- Dashboard files -->
<div class="container w-50 py-5">
    <h2 class="fs-1 pb-3">Legutóbbi fájljaid</h2>
    <table class="table table-striped table-hover">
        <thead class="text-center">
            <tr>
                <th>Fájlnév</th>
                <th>Fájltípus</th>
                <th>Szerző</th>
                <th>Utolsó megtekintés</th>
                <th>Eszközök</th>
            </tr>
        </thead>
        <tbody>

            @for($i = 0; $i < 30; $i++)
            <tr>
                <td class="text-center text-wrap">Mintafájl</td>
                <td class="text-center">PDF</td>
                <td class="text-center">Gipsz Jakab</td>
                <td class="text-center">2023.03.16.</td>
                <td class="text-center">
                    <span class="fa fa-arrow-down text-danger" title="Letöltés"></span>
                    <span class="fa fa-arrow-up text-success" title="Feltöltés"></span>
                    <span class="fa fa-share text-info" title="Megosztás"></span>
                </td>
            </tr>
            @endfor

        </tbody>
    </table>

    <div class="container d-flex gap-10 justify-content-center align-items-center">
        <span class="p-3 fa fa-arrow-left rounded-2 bg-info text-light"></span>
        <span class="fs-4">1</span>
        <span class="p-3 fa fa-arrow-right rounded-2 bg-info text-light"></span>
    </div>

</div>


<!-- Footer -->

</body>
</html>
