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
function search(text, parent) {
    if(text.length == 0) {
        parent.find('.search_list').removeClass('active');
    } else {
        setupAjax();
        $.ajax({
            url: '/ajax/find-product',
            data: {
                'slug_cate': parent.parent().find('.sort-theme [name=search_by]').val(),
                'search_text': parent.find('[name=search_key]').val()
            },
            method: 'POST',
            success: function(result) {
                parent.find('.search_list ul').html("");
                if(result.status === 200 && result.data.length > 0) {
                    for(let item of result.data) {
                        parent.find('.search_list ul').append(`<li data-slug_cate="${item.slug_cate}" data-slug="${item.slug}" onClick="redirect('${item.slug_cate}','${item.slug}')">${item.name}</li>`);
                    }
                } else {
                    parent.find('.search_list ul').append(`<li>không có dữ liệu</li>`);
                }
                if(!parent.find('.search_list').hasClass('active')) {
                    parent.find('.search_list').addClass('active');
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
        $(this).attr('src', '/assets_common/images/no-image.png');
    });
    // $('.child-menu li').on('click', function() {
    //     location.href = $(this).find('a').attr('href');
    // })
    // $('.sort-theme a').on('click', function() {
    //     $(this).parent().find('.sort-by').toggleClass('active')
    // })
    // $('.main-menu-small li').on('click', function() {
    //     _this = $(this).find('.child-menu-small li');
    //     if(_this.is(':hidden')) {
    //         $('.main-menu-small .fa-angle-down').removeClass('fa-angle-down').addClass('fa-angle-up');
    //         $(this).find('.child-menu-small li').slideDown('slow')
    //     } else {
    //         $('.main-menu-small .fa-angle-up').removeClass('fa-angle-up').addClass('fa-angle-down');
    //         $(this).find('.child-menu-small li').slideUp('slow')
    //     }
        
    // })
    // $('.sort-theme li').on('click', function() {
    //     $(this).parent().find('.sort-theme li').removeClass('active');
    //     $(this).addClass('active');
    //     $(this).parent().find('[name=search_by]').val($(this).data('sort'));
    //     $(this).parent().find('.sort-by').toggleClass('active');
    // })
    // $('form').on('submit', function(e){
    //     return false;
    // })
    // var timeout;
    // $('[name="search_key"]').on('keyup', function(e) {
    //     var _parent = $(this).parent();
    //     console.log("🚀 ~ file: custom.js ~ line 71 ~ $ ~ _parent", _parent)
    //     var text = $(this).val();
    //     var code = e.keyCode || e.which;
    //     if(code == 13) { //Enter keycode
    //         search(text,_parent);
    //     } else {
    //         clearTimeout(timeout);
    //     }
    // });
    // $('[name="search_key"]').on('focusout', function() {
    //     let _this = $(this).parent();
    //     _this.find('.search_list ul').html('');
    //     _this.find('.search_list').removeClass('active');
    //     _this.find('[name=search_key]').val('');
    // })

    // $('#pollSlider-button').click(function() {
    //     console.log($(this).css("right") != "0px");
    //     if($(this).css("right") != "0px")
    //     {
    //         console.log($(this).css("right"));
    //         $('.pollSlider').animate({"right": '-80%'});
    //         $('#pollSlider-button').animate({"right": '0%'});
    //     }
    //     else
    //     {
    //         $('.pollSlider').animate({"right": '0%'});
    //         $('#pollSlider-button').animate({"right": '+=80%'});
    //     }
    //   });
    
});