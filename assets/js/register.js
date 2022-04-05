$(document).ready(function() {

    $("#formRegister").submit(function(event){
        event.preventDefault();
        /*$.ajax({
            url : 'http://voicebunny.comeze.com/index.php',
            type : 'GET',
            data : {
                'numberOfWords' : 10
            },
            dataType:'json',
            success : function(data) {              
                alert('Data: '+data);
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });*/

        $("#errorForm").removeClass('d-none').removeClass('hide').addClass('d-block').addClass('show').html('Error save form');
        setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');}, 2000);

    });
    
    

});