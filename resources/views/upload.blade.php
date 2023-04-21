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
</head>
<body>
<!-- Menu -->
@include('menu')
@include('alert')

<!-- Upload -->
<form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="container w-50 min-vh-100">
        <h2 class="fs-1 pt-5 pb-3">Saját fájl feltöltése</h2>
        <p>Kérlek oszdd meg velünk, hogy mit kell tudnunk az általad feltöltésre kerülő fájlról!</p>

        <div class="d-flex">
            <label for="title">Cím:</label>
            <input type="text" name="title" id="title" class="flex-fill border-bottom fel p-1">
        </div>


        <div class="d-flex">
            <label for="subject">Tárgy:</label>
            <input class="flex-fill border-bottom fel p-1" type="text" name="subject" id="subject">
        </div>

        <div class="d-flex">
            <label for="topic">Témakör:</label>
            <select name="topic" id="topic" class="flex-fill border-bottom fel p-1">
                @foreach($types as $type)
                    <option class="text-end w-100" value="{{$type->name}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex">
            <label for="difficulty_level">Nehézségi szint: </label>
            <input class="flex-fill fel" type="range" min="1" max="5" value="3" name="difficulty_level" id="difficulty_level">
        </div>



        <div class="flex items-center justify-center w-full">
            <label for="dropzone-file"
                   class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-semibold">Kattints a feltöltéshez</span> vagy húzd ide és engedd el!
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        DOC, DOCX, XLS, XLSX, PPT, PPTX, képek vagy PDF tölhető fel!
                    </p>
                </div>
                <input id="dropzone-file" type="file" class="hidden"
                       accept="images/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                       name="file"
                />
            </label>
        </div>

        <div>
            <div class="flex justify-content-between align-items-center pt-3 pb-3">
                <div class="flex-1">
                    <h2 class="fs-2">Feltöltendő fájlok</h2>
                </div>
                <div class="flex-1 flex justify-content-end">
                    <button class="bg-sky-500 hover:bg-sky-600 text-white rounded-2 fw-bold p-2">Feltöltés</button>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <tr>
                    <td>demo.pdf</td>
                    <td class="text-right"><span class="fa fa-close hover:text-red-600"></span></td>
                </tr>
            </table>
        </div>

    </div>
</form>


<!-- Footer -->
@include("footer")
</body>
</html>
<?php
