$(document).ready(function() {
    $('#tdirec').change(function() { // change select tdirec
        var nganh = $("#tdirec").val();
        $.post("../model/value.php",{nganh:nganh},function(data){ // chuyen gia tri tdrec sang trang truy van value
            $("#tcate").html(data);
        })
})
})

$(document).ready(function() {
    $('#tcate').change(function() { // change select tcate
        var dm = $("#tcate").val();
        $.post("../model/value.php",{dm:dm},function(data){ // chuyen gia tri tcate sang trang truy van value
            $("#type").html(data);
        })
})
})  

$(document).ready(function() {
    $('#fact').change(function() { // change select factory
        var cty = $("#fact").val();
    //   alert(cty);
        $.post("../model/value.php",{cty:cty},function(data){ // chuyen gia tri factory sang trang truy van value
            $("#smt").html(data);
        })
})
})  