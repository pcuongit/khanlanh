<section class="section slider-section" id="section_1426617165">
    <div class="bg section-bg fill bg-fill  bg-loaded"></div>
    <div class="section-content relative">
        <div class="row row-small" id="row-764711443">
            <div class="col cot1 hide-for-medium medium-3 small-12 large-3">
                <div class="col-inner">
                </div>
            </div>
            @foreach($banners as $item)
            <div class="col cot2 hide medium-9 small-12 my-slide">
                <div class="col-inner">
                    <div class="slider-wrapper relative" id="slider-374743240">
                        <div class="slider slider-nav-dots-simple slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal flickity-enabled is-draggable slider-lazy-load-active"
                            data-flickity-options="" tabindex="0">
                            <div class="flickity-viewport" style="height: 330px; touch-action: pan-y;">
                                <div class="flickity-slider" style="left: 0px; transform: translateX(0%);">
                                    <div class="img has-hover x md-x lg-x y md-y lg-y is-selected" id="image_1743492625"
                                        aria-selected="true" style="position: absolute; left: 0%;">
                                        <div class="img-inner image-cover dark" style="padding-top:330px;"> <img
                                                width="852" height="377"
                                                src="{{asset($item->image_url)}}"
                                                class="attachment-original size-original lazy-load-active" alt=""
                                                sizes="(max-width: 852px) 100vw, 852px"></div>
                                        <style scope="scope">
                                        #image_1743492625 {
                                            width: 100%
                                        }
                                        </style>
                                    </div>
                                </div>
                            </div><button class="flickity-button flickity-prev-next-button previous" type="button"
                                disabled="" aria-label="Previous"><svg class="flickity-button-icon"
                                    viewBox="0 0 100 100">
                                    <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path>
                                </svg></button><button class="flickity-button flickity-prev-next-button next"
                                type="button" disabled="" aria-label="Next"><svg class="flickity-button-icon"
                                    viewBox="0 0 100 100">
                                    <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"
                                        transform="translate(100, 100) rotate(180) "></path>
                                </svg></button>
                            <ol class="flickity-page-dots">
                                <li class="dot is-selected" aria-label="Page dot 1" aria-current="step"></li>
                            </ol>
                        </div>
                        <div class="loading-spin dark large centered" style="display: none;"></div>
                        <style scope="scope"></style>
                    </div>
                </div>
            </div>
            @endforeach
            <style scope="scope"></style>
        </div>
    </div>
    <style scope="scope">
    #section_1426617165 {
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: rgb(239, 240, 243)
    }
    </style>
</section>
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
    $(x)[slideIndex - 1].style.display = "block";
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