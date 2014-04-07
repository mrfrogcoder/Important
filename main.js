var i = 0;
var by3 = 3;
var by4 = 4;
var viewModelLoader = {
    feature: ko.observableArray()
};

var myLoader = $("#myloader");
function loadContent(dtype) {
    $.ajax({
        url: './ajax/loadmore.json',
        dataType: 'json',
        type: 'GET',
        success: function (data) {
            var content = "";
            var by3 = "";
            var by4 = "";
            var myarr = [];
            var xarray = [];
            for (var i = 0; i < data.length; i++) {
                if (i < 7) {
                    if (i < 4) {
                        //myarr.push($.extend(data[i], { "column": "by3" }));
                        by4 += '<h3>' + data[i].title + '</h3><p>Credits: <span>' + data[i].description + '</span><button id="like">like</button></p>';
                    } else {
                        by3 += '<h3>' + data[i].title + '</h3><p>Credits: <span>' + data[i].description + '</span><button id="like">like</button></p>';
                    }
                }
            }
            content += "<div class='row' style='background: #ccc'>";
            content += by4;
            content += "</div>";
            content += "<div class='row' style='background: #ddd'>";
            content += by3;
            content += "</div>";
            if (dtype == 'html') {
                myLoader.html(content);
            } else {
                $(content).insertBefore($("#loadMore"));
                $("#loadMore button").attr('disabled', false);
            }
        }
    });
}
$(function () {
    loadContent('html');
    $("button").on('click', $("#loadMore"), function () {
        $(this).attr('disabled', true);
        loadContent('after');


        return false;
    });
    $("body").on('click', "#like", function () {
        if ($(this).hasClass('click')) {
            $(this).removeClass('click').text('like');;
        } else {
            $(this).addClass('click').text('unlike');
            
        }


        return false;
    });
});
