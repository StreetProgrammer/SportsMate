/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(4);


/***/ }),
/* 4 */
/***/ (function(module, exports) {

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
                c_desc: c_desc
            },
            success: function success(data) {
                if (data.errors) {
                    console.log(data);
                    swal({
                        title: "Not Valid ?",
                        text: "Check Errors, and try again !!!",
                        icon: "warning",
                        dangerMode: true
                    });
                    $('#contentChangable').css('opacity', '1');
                    $('.Loader').fadeOut();
                } else {
                    swal({
                        title: "Created",
                        text: "Club Account Main Information Created successfuly !!!",
                        icon: "success",
                        dangerMode: false
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
            dangerMode: true
        });
    }
});
///////////////////////////////////////////////////////////////////////////////////////////////////
/////////////// end validate and [[ Store ]] club profile main data [[ before register]] //////////
///////////////////////////////////////////////////////////////////////////////////////////////////

/***/ })
/******/ ]);