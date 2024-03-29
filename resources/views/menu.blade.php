<!-- Navigation -->
<div class="container-fluid shadow-md menu">
    <nav class="navbar navbar-expand-md d-flex">
        <div class="container flex-1">
            <a class="navbar-brand text-danger" href="{{ url('/') }}">
                <img class="w-25" src="../images/logo.svg" alt="ShareOn logo">
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarScroll"
                aria-controls="navbarScroll"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse flex-4" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll w-100 d-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Kezdőlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/search') }}">Keresés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/upload') }}">Feltöltés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/logout') }}">Kijelentkezés</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
