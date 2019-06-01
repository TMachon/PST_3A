 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  });

function readURLSeveralImages(input) {
    if (input.files) {

        for(var i = 0; i < input.files.length; i++){
            var reader = new FileReader();

            $(".carousel").append("<a class='carousel-item'>");
            reader.onload = function (e) {
                    $($.parseHTML('<img>'))
                        .attr('src', e.target.result)
                        .appendTo('#illustrations');
            };
            $(".carousel").append("</a>");

            reader.readAsDataURL(input.files[i]);
        }
    }
}