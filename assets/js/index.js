$('.register-here').on('click', function(){
    $('.login-section').hide();
    $('.register-section').show();
})
    
$('#exampleModalCenter').on('shown.bs.modal', function () {
    $('#exampleModalCenter').trigger('focus')
})       