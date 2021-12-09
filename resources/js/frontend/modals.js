$('#loginModal').on('show.bs.modal', function () {
    $('#signupModal').modal('hide');
});
$('#signupModal').on('show.bs.modal', function () {
    $('#loginModal').modal('hide');
});
$('#passwordResetSendEmailModal').on('show.bs.modal', function () {
    $('#loginModal').modal('hide');
});
$('#loginModal').on('shown.bs.modal', function (){
    $('body').addClass('modal-open');
});
$('#signupModal').on('shown.bs.modal', function (){
    $('body').addClass('modal-open');
});
$('#passwordResetSendEmailModal').on('shown.bs.modal', function (){
    $('body').addClass('modal-open');
});
$('#Modal-warning').on('show.bs.modal', function () {
    $('#buyOneClickModal').modal('hide');
});
$('#Modal-warning').on('shown.bs.modal', function (){
    $('body').addClass('modal-open');
});
