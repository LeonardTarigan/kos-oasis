<div id="nav-wrapper" class="fixed flex top-0 justify-between z-50 w-full transition-all duration-150">
    <nav class="flex max-w-screen-xl mx-auto justify-between w-full items-center py-5 px-20 text-white">
        <a href="/" class="logo text-2xl">OASIS</a>
        <div class="flex font-semibold gap-5">
            <a href="#rooms-section" class="cursor-pointer hover:underline">Kamar</a>
            <a href="#review-section" class="cursor-pointer hover:underline">Review</a>
            <a href="#map-section" class="cursor-pointer hover:underline">Lokasi</a>
        </div>
    </nav>
</div>

@if (Request::is('/'))
    <script>
        window.addEventListener("scroll", function() {
            var navbar = document.querySelector("#nav-wrapper");
            var scrollPosition = window.scrollY;

            if (scrollPosition > 0) {
                navbar.classList.add("bg-gold");
            } else {
                navbar.classList.remove("bg-gold");
            }
        });
    </script>
@else
    <script>
        var navbar = document.querySelector("#nav-wrapper");
        navbar.classList.add("bg-gold");
    </script>
@endif
