/* search */
$('.search-toggle').addClass('closed');
$('.search-container').addClass('closed-0');


$('.search-toggle .search-icon').click(function(e) {
  if ($('.search-toggle').hasClass('closed')) {
    $('.search-container').removeClass('closed-0').addClass('opened-0');
    $('.search-toggle').removeClass('closed').addClass('opened');
    $('.search-toggle, .search-container').addClass('opened');
    $('#search-terms').focus();
  } else {
    $('.search-toggle').removeClass('opened').addClass('closed');
    $('.search-container').removeClass('opened-0').addClass('closed-0');
    $('.search-toggle, .search-container').removeClass('opened');

  }
});




/* navigator */

$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled-2");
  $('#menu ul').hide();
});

function initMenu() {
  $('#menu ul').hide();
  $('#menu ul').children('.current').parent().show();
  //$('#menu ul:first').show();
  $('#menu li p').click(
     function() {
        var checkElement = $(this).next();
        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
           return false;
        }
        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
           $('#menu ul:visible').slideUp('normal');
           checkElement.slideDown('normal');
           return false;
        }
     }
  );
}

/*end navigator */


$(document).ready(function() {
  initMenu();
});

/* nav product mobile*/
function initMenunav() {
  $('#menu-nav ul').hide();
  $('#menu-nav ul').children('.current').parent().show();
  //$('#menu ul:first').show();
  $('#menu-nav li p').click(
     function() {
        var checkElement = $(this).next();
        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
           return false;
        }
        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
           $('#menu-nav ul:visible').slideUp('normal');
           checkElement.slideDown('normal');
           return false;
        }
     }
  );
}

/*end nav product mobile*/

$(document).ready(function() {
  initMenunav();
});


