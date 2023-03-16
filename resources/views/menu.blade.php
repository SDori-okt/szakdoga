<!-- Navigation -->
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../images/logo.svg" alt="ShareOn logo"></a>
        </div>

        <!-- Hambi menü -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menüpontok -->
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Kezdőlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/profil') }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/search') }}">Keresés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/upload') }}">Feltöltés</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
