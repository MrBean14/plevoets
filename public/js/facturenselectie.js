$(document).ready(function()
{

    var mijnSelectie = 0;

    $("input[name='factuur_selectie']:radio").change(function()
    {
        if (this.value == 1) {
            mijnSelectie = 1;
        }
        else if (this.value == 2) {
            mijnSelectie = 2;
        }
        else if (this.value == 3) {
            mijnSelectie = 3;
        }

        $.post("search/executeFacturenSearch", {keywords: mijnSelectie}).done(function (data) {
            $('#search-results').html(data)
        });
    });

});




