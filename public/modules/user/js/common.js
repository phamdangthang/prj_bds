$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("body").on("change", ".change_input", function(event) {
    let scop = this;
    if (scop.files && scop.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(scop).parent().find('img.img-preview').attr('src', e.target.result);
            $(scop).parent().find('img.img-preview').removeClass('d-none');
            
            $(scop).parent().parent().find('.icon-remove').removeClass('d-none');
        }
        reader.readAsDataURL(scop.files[0]);
    }
});
$('.icon-remove').on('click', function () {
    let html = `
        <div class="item">
            <i class="fe-x icon-remove d-none"></i>
            <label>
                <div class="label-mask"></div>
                
                <i class="fe-image icon-plus cursor-pointer"></i>
                <img src="" class="img-preview d-none">
                <input accept="image/*" type="file" class="change_input d-none" name="images[]">
            </label>
        </div>
    `;
    $(this).parent().replaceWith(html);
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