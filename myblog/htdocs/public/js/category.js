$(document).ready(function(){
    $.ajax({
        url: '../app/controllers/Catrgories.php',
        type: 'GET',
        success: function(response){
            var data = JSON.parse(response);
            $('#result')
        }
    })
})