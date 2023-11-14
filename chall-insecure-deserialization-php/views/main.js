$(document).ready(function(){
    $("#button-submit").click(function(){
        const payload = $("#payload").val();

        $.post("/index.php", {payload: payload}, function(data){
            $("#response").html(data);
        });
    });
});