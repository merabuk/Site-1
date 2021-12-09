$('.prev-action').click(function () {
    let el = $(this).data('current');
    $(this).data('current', null);

    if (!el) {
        el = $(this).data('default');
    }

    $(el).collapse('hide');

});
$('#catalogAccordion').on('shown.bs.collapse', function () {
    let showEl = $(this).find('.show').first();

    if (showEl.attr('id')) {
        $('#history').data('current', '#'+showEl.attr('id'));
    }
});

$('.main-catalog').hover(function () {
    $('#catalog-wrapper').collapse('show');
}, function () {
    $('#catalog-wrapper').collapse('hide');
    $('.accordion-header > [data-toggle="collapse"]').collapse('hide');
});

let lastTarget;
$('.accordion > li').hover(function (e) {
    if (window.innerWidth < 992) {
        return;
    }
    const target = $(this).find('.accordion-header > [data-toggle="collapse"]').first().data('target');
    lastTarget = target;

    setTimeout(function () {
        if (lastTarget === target) {
            $(target).collapse('show');
        }
    }, 300);
}, function (e) {
    if (window.innerWidth < 992) {
        return;
    }
    const target = $(this).find('.accordion-header > [data-toggle="collapse"]').first().data('target');
    lastTarget = target;

    setTimeout(function () {
        if (lastTarget === target) {
            $(target).collapse('hide');
        }
    }, 300);
});
