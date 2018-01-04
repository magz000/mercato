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

$('[data-plugin="text_limiter"]').keypress(function(e) {
  var tval = $(this).val(),
      tlength = tval.length,
      set = $(this).attr('data-limit'),
      remain = parseInt(set - tlength);
  $($(this).attr('data-counter')).text(remain);
  if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $(this).val((tval).substring(0, tlength - 1))
  }
})

$('.__rating').prop('selectedIndex', '-1');

$('.__rating').barrating('show', {
    initialRating : null,
    showSelectedRating: true,
    theme: 'fontawesome-stars',
    value : 0
});

$('.__rating_selected').barrating('show', {
    showSelectedRating: true,
    theme: 'fontawesome-stars',
    readonly: true
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

// $('.datetimepicker').datetimepicker({
// 	date : new Date($.now()),
// 	minDate : $.now(),
//     timepicker: false,
// 	format: 'Y-m-d'
// });

// $('.birthday').datetimepicker({
// 	date : new Date($.now()),
//     timepicker: false,
// 	format: 'Y-m-d'
// });

// $('#date').datetimepicker({
// 	date : new Date($.now()),
// 	minDate : $.now(),
//     timepicker: false,
// 	format: 'Y-m-d'
// });

$('#date').datetimepicker({
    minDate : $.now(),
    format: 'Y-m-d'
});

$('.birthday').datetimepicker({
    minDate : $.now(),
    format: 'Y-m-d'
});

$('.datepicker').datetimepicker({
    minDate : $.now(),
    format: 'Y-m-d'
});


