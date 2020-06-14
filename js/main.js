function topLayer(url, title, data)
{
    zamknij();
    showwait();
    $.ajax({
        url         : url,
        method      : "post",
        data        : data,
        success: function(result){
            hidewait();
            addTopLayer('edit', title)
            $("#edit").html(result);
        },
        error: function(){
            hidewait();
            addTopLayer('error', 'Wystąpił błąd');
            $("#error").html('spróbuj ponownie');
        }

    });
}

function addTopLayer(id, name){
    $(document.body).append('<div class="topLayer">' +
        '<img id="close" src="close_blue.png" onclick="zamknij()"/>' +
        '<h3>' + name + '</h3>' +
        '<div id="' + id + '"></div>' +
        '</div>');
}

function zamknij() {
    $('.topLayer').remove();
}

function showwait(){
    $(document.body).append('<div class="wait">' +
        '<h3>Proszę czekać</h3>' +
        '</div>');
}

function hidewait(){
    $('.wait').remove();
}