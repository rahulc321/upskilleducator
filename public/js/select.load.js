function load_data(id, index) {
    var urlRequest;
    if (id === "") {
        urlRequest = location.origin + "/loaddata/" + index;
    } else {
        urlRequest = location.origin + "/loaddata/" + index + "/" + id;
    }
    $.ajax({
        url: urlRequest,
        type: 'get',
        complete: function () {
        },
        success: function (data) {
            $("#" + index).html(data);
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    })
    ;
}

function load_seldata(id, index, selId) {
    var urlRequest;
    if (id === "") {
        urlRequest = location.origin + "/loadseldata/" + index + "/" + selId;
    } else {
        urlRequest = location.origin + "/loadseldata/" + index + "/" + selId + "/" + id;
    }
    $.ajax({
        url: urlRequest,
        type: 'get',
        complete: function () {
        },
        success: function (data) {
            $("#" + index).html(data);
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    })
    ;
}
