<section id="map-section" class="flex mt-20 flex-col px-20 gap-10 items-center">
    <h2 class="font-bold text-3xl">Lokasi Kami</h2>
    <div id="map" class="w-full h-[25rem] rounded-xl"></div>
</section>


<script>
    let map;

    async function initMap() {
        const {
            Map
        } = await google.maps.importLibrary("maps");

        map = new Map(document.getElementById("map"), {
            center: {
                lat: -7.952244,
                lng: 112.613470
            },
            zoom: 10,
        });
    }

    initMap();
</script>
