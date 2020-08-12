function add_location($loc){
    document.getElementById("Location").value = $loc;
}

function add_number($num){
    document.getElementById("Number").value = $num;
}

$(function(){
    $('#Date').datepicker({
        dateFormat: "yy/mm/dd"
    });
});

$(function() {
    $("#datepicker").click(function() {
        $('#Date').datepicker().datepicker( "show" )
    });
});