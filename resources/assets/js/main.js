//
// var __img_len = $('.__slider-item').length;
// var __ctr = 0;
// setInterval(function() {
//     if(__ctr == __img_len-1) {
//         __ctr = 0;
//     } else {
//         __ctr++;
//     }
//
//     $('.__slider-item:eq('+ __ctr +')').removeClass('exit').addClass("active");
//     $('.__slider-item:not(:eq('+ __ctr +'))').removeClass("active").addClass('exit');
// }, 5000);

var film_roll = new FilmRoll({
        configure_load: true,
        container: '#itemslide',
        scroll : false
      });

$('.example').barrating({
    theme: 'fontawesome-stars',
    readonly: true
  });

$('.dropdown-menu.filter').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
});

$( "#slider-range" ).slider({
     range: true,
     min: 0,
     max: 500,
     values: [ 75, 300 ],
     slide: function( event, ui ) {
       $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
     }
   });
   $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );

$('select[name="category"]').select2({
    placeholder: "Dessert..."
});

$('.__opt-categ').click(function() {
	var c = $(this).attr('data-category');
	var chk = $(this).hasClass('label-primary');

	if(chk) return false;

	$('.__opt-categ').not(this).toggleClass('label-primary label-default');
	$(this).toggleClass('label-default label-primary');


	var category = $('.__opt-categ.label-primary').attr('data-category');

	$('.__categ-failed[data-categ = "'+ category +'"]').show();
	$('.__categ-failed[data-categ != "'+ category +'"]').hide();

	$('input[name="type"]').val(category);
});

$('#date').datetimepicker({
	date : new Date($.now()),
	minDate : $.now(),
    timepicker: false,
	format: 'Y-m-d'
});
