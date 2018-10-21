///////////////////////////////////////////////////////////////////////////////////////////////////
///////////// start validate and [[ Store ]] club profile main data [[ before register]] //////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#StoreClubMainInfo", function (e) {
    e.preventDefault();
    var errors = 0;

    var name = $("input[name=name]").val();

    if (name.replace(/\s/g, "") === "") {

        errors = 1;
        $("input[name=name]").css({
            border: '2px solid #e80f0f',
            background: '#f7e7e7'
        });

    } else {
        $("input[name=name]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
    }

    var c_phone = $("input[name=c_phone]").val();

    if (c_phone.replace(/\s/g, "") === "") {

        errors = 1;
        $("input[name=c_phone]").css({
            border: '2px solid #e80f0f',
            background: '#f7e7e7'
        });

    } else {
        $("input[name=c_phone]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
    }

    var email = $("input[name=email]").val();

    if (email.replace(/\s/g, "") === "") {

        errors = 1;
        $("input[name=email]").css({
            border: '2px solid #e80f0f',
            background: '#f7e7e7'
        });

    } else {
        $("input[name=email]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
    }

    var c_city = $("select[name=c_city]").val();

    if (c_city.replace(/\s/g, "") === "") {

        errors = 1;
        $("select[name=c_city]").css({
            border: '2px solid #e80f0f',
            background: '#f7e7e7'
        });

    } else {
        $("select[name=c_city]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
    }

    var c_area = $("select[name=c_area]").val();

    if (c_area.replace(/\s/g, "") === "") {

        errors = 1;
        $("select[name=c_area]").css({
            border: '2px solid #e80f0f',
            background: '#f7e7e7'
        });

    } else {
        $("select[name=c_area]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
    }

    var c_address = $("input[name=c_address]").val();

    if (c_address.replace(/\s/g, "") === "") {

        errors = 1;
        $("input[name=c_address]").css({
            border: '2px solid #e80f0f',
            background: '#f7e7e7'
        });

    } else {
        $("input[name=c_address]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
    }

    var password = $("input[name=password]").val();

    if (password.replace(/\s/g, "") === "") {

        errors = 1;
        $("input[name=password]").css({
            border: '2px solid #e80f0f',
            background: '#f7e7e7'
        });

    } else {
        $("input[name=password]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
    }

    if (errors === 0) {
        $('#contentChangable').css('opacity', '0.6');
        $('.Loader').fadeIn();

        $("input[name=name]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
        $("input[name=c_phone]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
        $("input[name=email]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
        $("select[name=c_area]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
        $("select[name=c_city]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
        $("select[name=c_address]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
        $("select[name=password]").css({
            border: '2px solid #5cb85c',
            background: '#b2e8b2'
        });
        var _token = $("input[name=_token]").val();
        var user_img = $("input[name=user_img]").val();
        var type = $("input[name=type]").val();
        var user_img = $("input[name=user_img]").val();
        var c_desc = $('textarea#c_desc').val();
        $.ajax({
            type: 'POST',
            url: '/registerClub',

            data: {
                _token: _token,
                type: type,
                user_img: user_img,
                name: name,
                c_phone: c_phone,
                email: email,
                c_city: c_city,
                c_area: c_area,
                c_address: c_address,
                password: password,
                c_desc: c_desc,
            },
            success: function (data) {
                if (data.errors) {
                    console.log(data) ;
                    swal({
                        title: "Not Valid ?",
                        text: "Check Errors, and try again !!!",
                        icon: "warning",
                        dangerMode: true,
                    });
                    $('#contentChangable').css('opacity', '1');
                    $('.Loader').fadeOut();
                } else {
                    swal({
                        title: "Created",
                        text: "Club Account Main Information Created successfuly !!!",
                        icon: "success",
                        dangerMode: false,
                    });
                    //$('#clubUserName').text(data);
                    $('#contentChangable').css('opacity', '1');
                    $('.Loader').fadeOut();
                    $('#contentChangable').load('/club/editMainRegisterInfo').fadeIn('slow');
                    $('#pageTop').load('/club/registerPageTop').fadeIn('slow');
                }
                

            }
        });

    } else {

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
/////////////// end validate and [[ Store ]] club profile main data [[ before register]] //////////
///////////////////////////////////////////////////////////////////////////////////////////////////