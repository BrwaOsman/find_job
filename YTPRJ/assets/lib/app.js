$(document).ready(function(){
    $('.user').on("click",function(){
        $('.Fuser').removeClass('d-none');
        $('.Fcompany').addClass('d-none');
    })
    $('.company').on("click",function(){
        $('.Fcompany').removeClass('d-none');
        $('.Fuser').addClass('d-none');
    })
});

