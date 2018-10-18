
/* to get search results and display it  */
$(document).on('click', "#playground_filtters", function () {

    var id = this.id;

    var playgroundLoader = $("#" + id + "_loader");
    playgroundLoader.show();
    $("#search-result").css("filter", "blur(2px)");
    var data = {};

    var name_in = $("input[type=text][name=" + id + "_name]").val();
    if (name_in !== null && name_in !== "" && name_in.replace(/\s/g, "") !== "") {
        var name = name_in;
        data['name'] = name;
    }
    var sport_in = $("select[name=" + id + "_sport]").val();
    if (sport_in != null && sport_in != "") {
        var sport = sport_in;
        data['sport'] = sport;
    }

    var from_in = $("input[type=hidden][name=" + id + "_from]").val();
    if (from_in !== null && from_in !== "" && from_in.replace(/\s/g, "") !== "") {
        var from = from_in;
        data['from'] = from;
    }

    var to_in = $("input[type=hidden][name=" + id + "_to]").val();
    if (to_in !== null && to_in !== "" && to_in.replace(/\s/g, "") !== "") {
        var to = to_in;
        data['to'] = to;
    }

    var city_in = $("select[name=" + id + "_city]").val();
    if (city_in != null && city_in != "") {
        var city = city_in;
        data['city'] = city;
    }

    var area_in = $("select[name=" + id + "_area]").val();
    if (area_in != null && area_in != "") {
        var area = area_in;
        data['area'] = area;
    }

    var feature1_in = $("input[name=" + id + "_feature1]:checked").val();
    if (feature1_in != null && feature1_in != "") {
        var feature1 = feature1_in;
        data['feature1'] = feature1;
    }
    
    var feature2_in = $("input[name=" + id + "_feature2]:checked").val();
    if (feature2_in != null && feature2_in != "") {
        var feature2 = feature2_in;
        data['feature2'] = feature2;
    }
    var feature3_in = $("input[name=" + id + "_feature3]:checked").val();
    if (feature3_in != null && feature3_in != "") {
        var feature3 = feature3_in;
        data['feature3'] = feature3;
    }
    var feature4_in = $("input[name=" + id + "_feature4]:checked").val();
    if (feature4_in != null && feature4_in != "") {
        var feature4 = feature4_in;
        data['feature4'] = feature4;
    }
    var feature5_in = $("input[name=" + id + "_feature5]:checked").val();
    if (feature5_in != null && feature5_in != "") {
        var feature5 = feature5_in;
        data['feature5'] = feature5;
    }
    var feature6_in = $("input[name=" + id + "_feature6]:checked").val();
    if (feature6_in != null && feature6_in != "") {
        var feature6 = feature6_in;
        data['feature6'] = feature6;
    }
    var feature7_in = $("input[name=" + id + "_feature7]:checked").val();
    if (feature7_in != null && feature7_in != "") {
        var feature7 = feature7_in;
        data['feature7'] = feature7;
    }
     var feature8_in = $("input[name=" + id + "_feature8]:checked").val();
     if (feature8_in != null && feature8_in != "") {
         var feature8 = feature8_in;
         data['feature8'] = feature8;
     }

    console.log(jQuery.isEmptyObject(data) ? 'empty' : data);
    //alert(err) ;
    if (jQuery.isEmptyObject(data) == false) {
        alert(data) ;
        $('.reCheckLoader').fadeIn();
        var _token = $("input[name=_token]").val();
        var playgroundId = $("input[name=playgroundId]").val();
        $.ajax({
            type: 'GET',
            url: '/getPlaygroundSearchResults',
            data: data,
            success: function (data) {
                $('#clear_player_filter').fadeIn();
                $("#search-result").removeAttr("style");
                playgroundLoader.fadeOut();
                $('#search-result').html(data);
                console.log(data);
            }
        });
    } else {
        $.ajax({
            type: 'GET',
            url: '/freshPlaygroundSearchResults',
            data: { vars: 'no' },
            success: function (data) {
                playgroundLoader.fadeOut();
                $("#search-result").removeAttr("style");
                $('#search-result').html(data);
                console.log(data);
            }
        });
    }

});

/* for clear search and return all things to first case */
$(document).on('click', "#clear_playground_filter", function () {
    $("#search-result").css("filter", "blur(2px)");
    $.ajax({
        type: 'GET',
        url: '/freshPlayerSearchResults',
        data: { vars: 'no' },
        success: function (data) {
            $("#search-result").removeAttr("style");
            $('#search-result').html(data);
            $('#search-filtter').load('/getPlaygroundFilter');
            console.log(data);
            //$('#AddGameLoading').hide();

        }
    });

});
