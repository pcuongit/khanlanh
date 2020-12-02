<div class="row w-100 bg-">
    <div class="slide-content w-100">
        @php
        $banner = \App\Models\Banner::orderBy('priorty', 'asc')->get();
        @endphp
        @foreach($banner as $item)
        <img class="my-slide" src="{{asset($item->image_url)}}" style="width:100%">
        @endforeach
        <!-- <iframe class="my-slide" width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY?enablejsapi"> -->
        <!-- </iframe> -->
        @if($banner->count() > 1)
        <button class="w3-button w3-display-left" onclick="plusDivs(-1)" id="slide_prev">&#10094;</button>
        <button class="w3-button w3-display-right" onclick="plusDivs(1)" id="slide_next">&#10095;</button>
        @endif
    </div>
</div>
<script>
var slideIndex = 1;
plusDivs(1);
var timeout = setTimeout(() => {
    plusDivs(1);
}, 3000);
// autoSlider();

function plusDivs(n) {
    clearTimeout(timeout);
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = $(".my-slide");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        $(x)[i].style.display = "none";
    }
    if ($(x)[slideIndex - 1].tagName == 'IFRAME') {
        // let href = $($(x)[slideIndex - 1]).data('src');
        // console.log("🚀 ~ file: slider.blade.php ~ line 26 ~ plusDivs ~ href", href)
        var symbol = $(x)[slideIndex - 1].src.indexOf("?") > -1 ? "&" : "?";
        //modify source to autoplay and start video
        $(x)[slideIndex - 1].src += symbol + "autoplay=1";
        // $('.my-slide')[slideIndex - 1].src = href;
        setTimeout(() => {
            $(x)[slideIndex - 1].style.display = "block";
        }, 300)
    } else {
        $(x)[slideIndex - 1].style.display = "block";
    }
    timeout = setTimeout(() => {
        plusDivs(1);
    }, 3000);
}


// function autoSlider() {
//     if (document.getElementsByClassName("my-slide").length > 0) {
//         showDivs(slideIndex);
//         setInterval(function() {

//         }, 5000);
//     }
// }
</script>