// header-fixed 
$(window).scroll(function() {
    if ($(window).scrollTop() > 1)  {
        $('.header').addClass('header-fixed');
    } else {
        $('.header').removeClass('header-fixed');
    }
})

// search-header 
$(document).ready(function() {
    $(".icon-search").click(function() {
        let value = $(".form-inp-search").css("display");
        console.log(value);
        if(value == "none"){
            $(".form-inp-search").css({
                'display' : 'flex'
            })
        } else {
            $(".form-inp-search").css({
                'display' : 'none'
            })
        }
    })
})


// readmore 
$(document).ready(function() {
    $('.btn-readmore > span').click(function() {
        $('.post-product').addClass('readmore-post');
    })

    $('.btn-readmore-post > span').click(function() {
        $('.post-product').removeClass('readmore-post');
    })
})

$(document).ready(function() {
    $(".btn-readmore > span").click(function() {
        let value = $(".btn-readmore-post").css("display");
        console.log(value);
        if(value == "none"){
            $(".btn-readmore-post").css({
                'display' : 'flex'
            })
        } else {
            $(".btn-readmore-post").css({
                'display' : 'none'
            })
        }
    })

    $(".btn-readmore-post").click(function() {
        $(".btn-readmore-post").hide();
    })
})


// choose img seen 
function changeImage(id) {
    let imagePath = document.getElementById(id).getAttribute('src');

    document.getElementById('img-main').setAttribute('src', imagePath);
}

// zoom img
// function zoom(e) {
//     var zoomer = e.currentTarget;
//     e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
//     e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
//     x = (offsetX / zoomer.offsetWidth) * 600
//     y = (offsetY / zoomer.offsetHeight) * 600
//     zoomer.style.backgroundPosition = x + "% " + y + "%";
// }


// popup choose
$(document).ready(function() {
    $(".btn-tutorial-choose-size > span").click(function() {
        let value = $(".popup-choose-size").css("display");
        console.log(value);
        if(value == "none"){
            $(".popup-choose-size").css({
                'display' : 'flex'
            })
        } else {
            $(".popup-choose-size").css({
                'display' : 'none'
            })
        }
    })

    $(".btn-close > span").click(function() {
        $(".popup-choose-size").hide();

        $(".popup-choose-size").click(function(event) {
            event.stopPropagation();
        })
    })
})

// popup-pay-success
$(document).ready(function() {
    $(".pay-success").click(function() {
        $(".popup-pay-success").hide();

        $(".popup-pay-success").click(function(event) {
            event.stopPropagation();
        })
    })
})

// popup infor product
$(document).ready(function() {
    $(".icon-view-infor").click(function() {
        let value = $(".popup-infor-product").css("display");
        console.log(value);
        if(value == "none"){
            $(".popup-infor-product").css({
                'display' : 'flex'
            })
        } else {
            $(".popup-infor-product").css({
                'display' : 'none'
            })
        }
    })

    $(".close-popup").click(function() {
        $(".popup-infor-product").hide();

        $(".popup-infor-product").click(function(event) {
            event.stopPropagation();
        })
    })
})


// choose-size 
$(document).ready(function() {
    $('.border-choose-size').click(function() {
        if($(this).hasClass(`active`)) {
            $(this).removeClass('active');
        }
        else {
            $('.border-choose-size').removeClass('active');
            $(this).addClass(`active`); 
        }
    })
})



// btn tăng giảm số lượng 
$('input.input-qty').each(function() {
    var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
    if (min == 0) {
        var d = 0
    } else d = min
    $(qty).on('click', function() {
        if ($(this).hasClass('minus')) {
            if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
            var x = Number($this.val()) + 1
            if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
        $(`.qty-quick`).val(d)
    })
})



$(document).ready(function() {
    $('.list-menu-header li').click(function() {
    })
})


// range-input 
let min = 10;
let max = 100;

const calcLeftPosition = value => 100 / (100 - 10) * (value - 10);

$('#rangeMin').on('input', function(e) {
  const newValue = parseInt(e.target.value);
  if (newValue > max) return;
  min = newValue;
  $('#thumbMin').css('left', calcLeftPosition(newValue) + '%');
  $('#min').html(newValue);
  $('#line-range-input').css({
    'left': calcLeftPosition(newValue) + '%',
    'right': (100 - calcLeftPosition(max)) + '%'
  });
});

$('#rangeMax').on('input', function(e) {
  const newValue = parseInt(e.target.value);
  if (newValue < min) return;
  max = newValue;
  $('#thumbMax').css('left', calcLeftPosition(newValue) + '%');
  $('#max').html(newValue);
  $('#line-range-input').css({
    'left': calcLeftPosition(min) + '%',
    'right': (100 - calcLeftPosition(newValue)) + '%'
  });
});