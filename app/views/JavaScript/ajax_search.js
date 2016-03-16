$(document).ready (function(){
    $("select[name='type']").bind("change",function(){
        $.get("/app/views/JavaScript/ajax_php/check_type.php", {type:$("select[name='type']").val()},function(data){
            data = JSON.parse(data);
            $("select[name='subject']").empty();
            for(var id in data){
                $("select[name='subject']").append($("<option value='" + id + "'>"+ data[id] + "</option>"));
            }
        });
    });
});