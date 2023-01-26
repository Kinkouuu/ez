$(document).ready(function(){
    $("#fact").change(function(){
        var f_id = $("#fact").val(); // lay f_id khi thay doi selection
        // alert (f_id);
        $.post("../view/data.php",{f_id: f_id},function(data){
            $("#product").html(data);
        }) // chuyen huong du lieu trang data ve id product
    });
})