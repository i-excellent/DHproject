/**
 * Created by losso on 16.03.2016.
 */
$(function() {
    $(".search_button").click(function() {
        // получаем то, что написал пользователь
        var searchString    = $("#search_box").val();
        // формируем строку запроса
        var data            = 'search='+ searchString;
        // если searchString не пустая
        if(searchString) {
            // делаем ajax запрос
            $.ajax({
                type: "POST",
                url: "/app/views/JavaScript/ajax_php/work_search.php",
            data: data,
            beforeSend: function(html) { // запустится до вызова запроса
               $("#results").html('');
                $("#searchresults").show();
                $(".word").html(searchString);
            },
            success: function(html){ // запустится после получения результатов
                $("#results").show();
                $("#results").append(html);
            }
        });
        }
        return false;
    });
});