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

    <!-- Custom -->
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
<!-- Menu -->
@include("menu")


<!-- Upload -->
<div class="container w-50 min-vh-100">
    <h2 class="fs-1 pt-5 pb-3">Saját fájl feltöltése</h2>
    <form action="" method="POST" class="d-flex bg-light p-5 rounded-2 shadow-md flex-column gap-5">
        <input type="file" id="fajl" placeholder="Fájl">
        <input type="text" id="kategoria" placeholder="Kategória">
        <input type="submit" value="Feltöltés">
    </form>
</div>


<!-- Footer -->
@include("footer")
</body>
</html>
<?php
