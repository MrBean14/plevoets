var timer;

function up() {
    timer = setTimeout(function () {
        var keywords = $('#search-input').val();

        if (keywords.length > 0) {
            $.post("search/executeSearch", {keywords: keywords}).done(function (data) {
                console.log(data)
                $('#search-results').html(data)
            });
        }
    }, 500);
}

function down() {
    clearTimeout(timer);
}