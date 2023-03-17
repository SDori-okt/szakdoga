<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ShareON</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <!-- Font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="../css/app.css">

    </head>
    <body>
        <div class="container-fluid vh-100 d-flex align-items-center justify-content-center bg-gray">
            <div class="row p-5">
                <div class="col-md-6 pe-sm-3 pe-md-0 d-flex align-items-center justify-content-start flex-column">
                    <h1>ShareON</h1>
                    <h3>A tudás mindenkié!</h3>ex
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-center login p-md-5 bg-gray">
                    <h2>Bejelentkezés</h2>

                    <form method="POST" >
                        <input type="email" id="email"><br>
                        <input type="password" id="pass"><br>
                        <input type="submit" value="Belépés">
                    </form>
                    <p>Ha még nem regisztráltál, akkor <a href="">ide kattintva</a> most megteheted!</p>
                </div>
            </div>
        </div>

    </body>
</html>
