(function() {
  $(function() {
    $.fn.goTo = function() {
      $('html, body').animate({
        scrollTop: $(this).offset().top - 150
      }, 'fast');
      return this;
    };
    $('.price-list a').click(function() {
      return $('#' + $(this).data('id')).goTo();
    });
    $('.slick-carousel').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000
    });
    CKEDITOR.config.language = 'ru';
    if ($('#desc').length) {
      CKEDITOR.replace('desc', {
        height: 300
      });
    }
    if ($('#answer').length) {
      CKEDITOR.replace('answer', {
        height: 300
      });
    }
    if ($('#content').length) {
      CKEDITOR.replace('content', {
        height: 300
      });
    }
    $('.fancybox').fancybox();
    $('.single-feature').hover(function() {
      var imgName;
      imgName = $(this).parent('a').attr('href');
      $('.tab-content .tab-pane').removeClass('active');
      return $('#' + imgName).addClass('active');
    });
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
      return $(this).alert('close');
    });
    $("input[name='width']").change(function(e) {
      var changePricesTableRequest, itemName, width;
      width = $(this).val();
      itemName = $(this).parent().siblings('name').text();
      return changePricesTableRequest = $.ajax({
        url: "/prices/" + itemName + "/" + width,
        method: "GET"
      });
    });
    $('.prices').magnificPopup({
      delegate: 'a',
      type: 'image',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1]
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
      }
    });
    $('.expand-table-link').click(function() {
      if ($(this).text() === 'Свернуть') {
        $(this).text('Развернуть');
      } else {
        $(this).text('Свернуть');
      }
      return $(this).prev('table').find('tr:nth-child(n + 9)').toggle();
    });
  });

  $.goup();

  $("a.fancy-img").fancyboxPlus({
    'transitionIn': 'elastic',
    'transitionOut': 'elastic',
    'speedIn': 600,
    'speedOut': 200,
    'overlayShow': false
  });

}).call(this);

//# sourceMappingURL=app.js.map
