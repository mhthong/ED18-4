

function increase() {

    let minNumber = 1;
    let number;
    number = 1;
    $('.input').val(number)
    $('.increase').on('click', function (e) {
      number = number + 1;
      $('input').val(number)
    });
    $('.decrease').on('click', function (e) {
      e.preventDefault();
      number = number - 1;
      if (number < minNumber){
        number = 1;
      }
      $('input').val(number)
    });

 }

 $(document).ready(function(){
	increase();
    // Do stuff here, including _calling_ codeAddress(), but not _defining_ it!
}); 

