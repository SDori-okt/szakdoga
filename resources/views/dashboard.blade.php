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

    <!-- Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.2/dist/full.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/home.css">

    <!--Custom JS -->
    <script src="js/share.js"></script>
</head>
<body>
@include('menu')
@include('alert')

<div class="container w-50">
    <h2 class="fs-1 pb-3 pt-5">Statisztikád</h2>
    <div class="container p-0 d-md-flex gap-10 justify-content-between">
        <div class="w-50 shadow-md p-5 rounded-3 bg-danger d-flex flex-column
            align-items-center justify-content-center">
            <h2>Letöltések</h2>
            <p class="fs-1 fw-bold">4</p>
        </div>
        <div
            class="w-50 shadow-md p-5 rounded-3 bg-success d-flex flex-column
                align-items-center justify-content-center">
            <h2>Feltöltések</h2>
            <p class="fs-1 fw-bold">{{$myfiles->count()}}</p>
        </div>
        <div
            class="w-50 shadow-md p-5 rounded-3 bg-warning d-flex flex-column
                align-items-center justify-content-center">
            <h2>Pontszám</h2>
            <p class="fs-1 fw-bold">{{user()->point}}</p>
        </div>
    </div>
</div>

<div class="container w-50 py-5">
    <h2 class="fs-1 pb-3">Legutóbbi fájljaid</h2>
    <table class="table table-striped table-hover">
        <thead class="text-center">
        <tr>
            <th>Cím</th>
            <th>Típus</th>
            <th>Tantárgy</th>
            <th>Évfolyam</th>
            <th>Feltöltve</th>
            <th>Eszközök</th>
        </tr>
        </thead>
        <tbody>

        @foreach($myfiles as $myfile)
            <tr>
                <td class="text-center text-wrap">
                    {{$myfile->title}}
                </td>
                <td class="text-center">
                    {{$myfile->type}}
                </td>
                <td class="text-center">
                    {{$myfile->subject}}
                </td>
                <td class="text-center">
                    {{$myfile->grade}}
                </td>
                <td class="text-center">
                    {{$myfile->created_at->toDateString('Y-m-d')}}
                </td>
                <td class="text-center">
                    <a href="{{ route('downloadFile', ['file_name' => $myfile->file_name]) }}">
                        <span
                            class="fa fa-download text-success cursor-pointer"
                            title="Letöltés">
                        </span>
                    </a>
                    <a href="{{ route('deleteFile', ['filename' => $myfile->file_name]) }}">
                        <span
                            class="fa fa-times text-danger cursor-pointer"
                            title="Törlés">
                        </span>
                    </a>
                    <a
                        href="#"
                        onclick="copyToClipboard('{{ route('downloadFile', ['file_name' => $myfile->file_name]) }}')"
                    >
                        <span
                            class="fa fa-share-alt text-info cursor-pointer"
                            title="Megosztás">
                        </span>
                    </a>

                </td>
            </tr>
        @endforeach


        </tbody>
    </table>

    <div class="container d-flex gap-10 justify-content-center align-items-center">
        <span class="p-3 fa fa-arrow-left rounded-2 bg-info text-light pagination"></span>
        <span class="fs-4">1</span>
        <span class="p-3 fa fa-arrow-right rounded-2 bg-info text-light pagination"></span>
    </div>

</div>

@include("footer")
</body>
</html>
