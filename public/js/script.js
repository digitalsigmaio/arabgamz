$(document).ready(function () {
   $('.download').on('click', function () {
      var game_id = $(this).parent().find('input').val();


       $.ajax({
           type: "POST",
           headers: {
               'X-CSRF-TOKEN': $('input[name="_token"]').val()
           },
           data: {
               gameId: game_id
           },
           url : "/downloads",
           success : function (data) {
               console.log(data);
           }
       });
   });

   $('.top-download').mouseenter(function () {
       $(this).find('.download-count').animate({
           opacity: 1,
           height: 35,
           width: 35,
           fontSize: '1.4em'
       }, 'slow');
   });

    $('.top-download').mouseleave(function () {
        $(this).find('.download-count').animate({
            opacity: 0.8,
            height: 30,
            width: 30,
            fontSize: '1em'
        }, 'slow');
    });

});