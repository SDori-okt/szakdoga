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
        <div>
            <span class="footer-title">Oldaltérkép</span>
            <div class="grid grid-flow-col gap-4">
                <ul>
                    <li><a href="{{ url('/') }}">Kezdőlap</a></li>
                    <li><a href="{{ url('/search') }}">Keresés</a></li>
                    <li><a href="{{ url('/upload') }}">Feltöltés</a></li>
                    <li><a href="{{ url('/logout') }}">Kijelentkezés</a></li>
                </ul>
            </div>
        </div>
        <div>
            <span class="footer-title">Dokumentumok</span>
            <div class="grid grid-flow-col gap-4">
                <ul>
                    <li>
                        <a href="https://hu.lmgtfy.app/?q=adatkezelési+tájékoztató" target="_blank">
                            Adatkezelési tájékoztató
                        </a>
                    </li>
                    <li>
                        <a href="https://hu.lmgtfy.app/?q=süti+nyilatkozat" target="_blank">
                            Süti nyilatkozat
                        </a>
                    </li>
                    <li>
                        <a href="https://hu.lmgtfy.app/?q=impresszum" target="_blank">
                            Impresszum
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <span class="footer-title">Social</span>
            <div class="grid grid-flow-col gap-4">
                <a href="https://facebook.com" target="_blank"><span class="fa fa-facebook"></span></a>
                <a href="https://instagram.com" target="_blank"><span class="fa fa-instagram"></span></a>
                <a href="https://twitter.com" target="_blank"><span class="fa fa-twitter"></span></a>
            </div>
        </div>
    </div>
    <div class="text-sm px-10 text-neutral-content">
        <p class="py-3 border-t-2 border-white">
            2023
            <span class="fa fa-copyright"></span>
            ShareOn. Design: Stencinger Dóra
        </p>
    </div>
</footer>
