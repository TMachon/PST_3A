$(document).ready(function(){
    $('.carousel').carousel();
});

function readURL(input) {
    if (input.files) {

        for(var i = 0; i < input.files.length; i++){
            var reader = new FileReader();

            reader.onload = function (e) {
                    $($.parseHTML('<img>'))
                        .attr('src', e.target.result)
                        .appendTo('#illustrations');
            };
            reader.readAsDataURL(input.files[i]);
        }
    }
}