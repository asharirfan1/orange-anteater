$ ->

    $.fn.goTo = ->
        $('html, body').animate({
            scrollTop: ($(this).offset().top - 150)
        }, 'fast')
        return this

    $('.price-list a').click ->
        $('#' + $(this).data('id')).goTo();

    $('.slick-carousel').slick
        slidesToShow: 5 
        slidesToScroll: 1
        autoplay: true
        autoplaySpeed: 2000

    CKEDITOR.config.language = 'ru'

    if $('#desc').length then CKEDITOR.replace('desc', height: 300)
    if $('#answer').length then CKEDITOR.replace('answer', height: 300)
    if $('#content').length then CKEDITOR.replace('content', height: 300)

    $('.fancybox').fancybox()

#    map = new GMaps(
#        el: '#map'
#        lat: 50.44985
#        lng: 30.523151
#        draggable: false
#        scrollwheel: false
#        disableDoubleClickZoom: true
#        zoomControl: false
#    )
#
#    map.addMarker
#        lat: 50.44985
#        lng: 30.523151
#        title: 'Kiev'
#        infoWindow:
#            content: '<h4>Kiev</h4>'
#            maxWidth: 100


    # change pictures when hovering categories on the main screen
    $('.single-feature').hover ->
        imgName = $(this).parent('a').attr('href')
        $('.tab-content .tab-pane').removeClass('active')
        $('#' + imgName).addClass('active')

    $(".alert-success").fadeTo(2000, 500).slideUp 500, ->
        $(this).alert 'close'


    # change prices tables
    $("input[name='width']").change (e) ->
        width = $(this).val()
        itemName = $(this).parent().siblings('name').text()

        changePricesTableRequest = $.ajax
            url: "/prices/" + itemName + "/" + width
            method: "GET"


    $('.prices').magnificPopup
        delegate: 'a'
        type: 'image'
        mainClass: 'mfp-img-mobile'
        gallery:
            enabled: true
            navigateByImgClick: true
            preload: [0,1] # Will preload 0 - before current, and 1 after the current image
        
        image:
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'

        # zoom:
        #     enabled: true
        #     duration: 300
        #     easing: 'ease-in-out'
        #     opener: (openerElement) ->
        #       return openerElement.is('img') ? openerElement : openerElement.find('img')

    $('.expand-table-link').click ->
        if $(this).text() == 'Свернуть'
            $(this).text('Развернуть');
        else
            $(this).text('Свернуть');

        $(this).prev('table').find('tr:nth-child(n + 9)').toggle();


    return

# scroll to the top button
$.goup()


# initialize fancybox plugin (cool image viewer)
$("a.fancy-img").fancyboxPlus
	'transitionIn': 'elastic'
	'transitionOut': 'elastic'
	'speedIn':	600
	'speedOut':	200
	'overlayShow':	false
