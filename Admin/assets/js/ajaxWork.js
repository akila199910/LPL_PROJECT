

function showModerators(){  
    $.ajax({
        url:"indexmodertor.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
