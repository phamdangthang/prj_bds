$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function showModalUser (param) {
    if (param === 'register') {
        $('.tab-register').addClass('active');
        $('.tab-login').removeClass('active');

        $('.tab-content-register').addClass('active');
        $('.tab-content-login').removeClass('active');
        $('.tab-content-register').addClass('show');
        $('.tab-content-login').removeClass('show');
    }
    if (param === 'login') {
        $('.tab-login').addClass('active');
        $('.tab-register').removeClass('active');

        $('.tab-content-register').removeClass('active');
        $('.tab-content-register').removeClass('show');
        $('.tab-content-login').addClass('active');
        $('.tab-content-login').addClass('show');
    }
    $('#modal-register-login').modal('show');
}

$(document).on('click', '.tab-login', function () {
    $('.tab-register').removeClass('active');
})

$(document).on('click', '.tab-register', function () {
    $('.tab-login').removeClass('active');
})

$('#toggleChangePass').on('click', function () {
    $('.box-change-password').slideToggle()
})