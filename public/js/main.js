$.get('/api/authors', function (res) {
    console.log(res, typeof res); //проверем приходит ли json
    var ul = $('.authorsList');
    $('.authorsList>li').remove();
    $.each(res, function (i, e) {
        ul.append("<li>" + e.name + "</li>");
    });
});

$('.addAuthor').click(function () {
    $.post('/api/authors/new', {
        name: $('#newAuthor').val(),
        _token: $('meta[name="_token"]').attr('content')
    }, function (res) {
        console.log(res);//проверка
        if (res.status == "success") {
            var ul = $('.authorsList');
            ul.append("<li>" + $('#newAuthor') + "</li>");
        }
    }, "json");
});