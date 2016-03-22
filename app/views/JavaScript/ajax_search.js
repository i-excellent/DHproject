$(document).ready (function(){
    $("select[name='type']").bind("change",function(){
        $.post("/set/ajax", {type:$("select[name='type']").val()},function(data,iddata){
            data = JSON.parse(data);
            $("select[name='subject']").empty();
            for(var id in data){
                $("select[name='subject']").append($("<option value='"+ data[id].id_subject +"'>"+ data[id].subject_name + "</option>"));
            }
        });
    });
});