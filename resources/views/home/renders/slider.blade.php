<div class="row w-100 bg-">
    <div class="slide-content w-100">
        <img class="my-slide" src="https://www.w3schools.com/w3css/img_lights.jpg" style="width:100%">
        <img class="my-slide" src="https://www.w3schools.com/w3css/img_lights.jpg" style="width:100%">
        <img class="my-slide" src="https://www.w3schools.com/w3css/img_lights.jpg" style="width:100%">
        <img class="my-slide" src="https://www.w3schools.com/w3css/img_lights.jpg" style="width:100%">

        <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
</div>
<script>
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
</script>