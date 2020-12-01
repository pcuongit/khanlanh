<div class="row w-100 bg-">
    <div class="slide-content w-100">
        @php
        $banner = \App\Models\Banner::orderBy('priorty', 'asc')->get();
        @endphp
        @foreach($banner as $item)
        <img class="my-slide" src="{{asset($item->image_url)}}" style="width:100%">
        @endforeach
        @if($banner->count() > 1)
        <button class="w3-button w3-display-left" onclick="plusDivs(-1)" id="slide_prev">&#10094;</button>
        <button class="w3-button w3-display-right" onclick="plusDivs(1)" id="slide_next">&#10095;</button>
        @endif
    </div>
</div>
<script>
autoSlider();
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("my-slide");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}

function autoSlider() {
    setInterval(function() {
        plusDivs(1);
    }, 5000);
}
</script>