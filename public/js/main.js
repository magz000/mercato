/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

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
  scroll: false
});

$('[data-plugin="text_limiter"]').keypress(function (e) {
  var tval = $(this).val(),
      tlength = tval.length,
      set = $(this).attr('data-limit'),
      remain = parseInt(set - tlength);
  $($(this).attr('data-counter')).text(remain);
  if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
    $(this).val(tval.substring(0, tlength - 1));
  }
});

$('.example').barrating({
  theme: 'fontawesome-stars',
  readonly: true
});

$('.dropdown-menu.filter').click(function (e) {
  e.preventDefault();
  e.stopPropagation();
});

$("#slider-range").slider({
  range: true,
  min: 0,
  max: 500,
  values: [75, 300],
  slide: function slide(event, ui) {
    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
  }
});
$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

$('select[name="category"]').select2({
  placeholder: "Dessert..."
});

$('.__opt-categ').click(function () {
  var c = $(this).attr('data-category');
  var chk = $(this).hasClass('label-primary');

  if (chk) return false;

  $('.__opt-categ').not(this).toggleClass('label-primary label-default');
  $(this).toggleClass('label-default label-primary');

  var category = $('.__opt-categ.label-primary').attr('data-category');

  $('.__categ-failed[data-categ = "' + category + '"]').show();
  $('.__categ-failed[data-categ != "' + category + '"]').hide();

  $('input[name="type"]').val(category);
});

$('#date').datetimepicker({
  date: new Date($.now()),
  minDate: $.now(),
  timepicker: false,
  format: 'Y-m-d'
});

/***/ })

/******/ });