function setupAjax() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
function hideSpinner() {
    $('#spinner').hide();
}
function showSpinner() {
    $('#spinner').show();
}
function search(text) {
    if(text.length == 0) {
        $('.search_list').removeClass('active');
    } else {
        setupAjax();
        $.ajax({
            url: '/ajax/find-product',
            data: {
                'slug_cate': $('[name=search_by]').val(),
                'search_text': $('[name=search_key]').val()
            },
            method: 'POST',
            success: function(result) {
                $('.search_list ul').html("");
                if(result.status === 200 && result.data.length > 0) {
                    for(let item of result.data) {
                        $('.search_list ul').append(`<li data-slug_cate="${item.slug_cate}" data-slug="${item.slug}" onClick="redirect('${item.slug_cate}','${item.slug}')">${item.name}</li>`);
                    }
                } else {
                    $('.search_list ul').append(`<li>không có dữ liệu</li>`);
                }
                if(!$('.search_list').hasClass('active')) {
                    $('.search_list').addClass('active');
                }
            },
            error: function(data) {}
        })
    };
}
function redirect(slug_cate, slug) {
    location.href = '/san-pham/' + slug_cate + '/' + slug;
}
$(window).on('load', function() {
    var img = $("img");
    img.on('load', function(e){
        
    }).on('error', function(e) {
        $(this).attr('src', '/image_common/no-image.png');
    });
    $('.child-menu li').on('click', function() {
        location.href = $(this).find('a').attr('href');
    })
    $('.sort-theme a').on('click', function() {
        $('.sort-by').toggleClass('active')
    })
    $('.sort-theme li').on('click', function() {
        $('.sort-theme li').removeClass('active');
        $(this).addClass('active');
        $('[name=search_by]').val($(this).data('sort'));
        $('.sort-by').toggleClass('active');
    })
    $('#form-search').on('submit', function(e){
        return false;
    })
    var timeout;
    $('[name="search_key"]').on('keyup', function(e) {
        var text = $(this).val();
        var code = e.keyCode || e.which;
        if(code == 13) { //Enter keycode
            search(text);
        } else {
            clearTimeout(timeout);
        }
    });
    // $('[name="search_key"]').on('keydown',function(e) {
    //     timeout = setTimeout(function() {
    //         search($('[name="search_key"]').val());
    //     },2000)
    // })
});