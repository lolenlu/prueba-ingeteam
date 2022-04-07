$(document).ready(function() {
    const base_url= $('#base_url').val();
    $("#btnRegister").click(function(){
        window.location = 'register';
    });

    $("#formLogIn").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url:base_url+'index.php?controller=user&action=login',
            data:$('#formLogIn').serializeArray(),
            beforeSend:function(xhr, settings){
            },
            success:function(data){
                
                    if($.trim(data) === 'success'){
                        $("#errorForm").removeClass('d-none').removeClass('alert-danger').removeClass('hide').addClass('alert-success').addClass('d-block').addClass('show').html('Login successfull');
                        setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');
                         $.redirect('../../views/user/home', { user: $("#email").val()});
                        }, 2000);
                    }else{
                        $("#errorForm").removeClass('d-none').removeClass('alert-success').removeClass('hide').addClass('alert-danger').addClass('d-block').addClass('show').html(data);
                        setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');}, 2000);
                    }

            },
            error: function(data) {
                       $("#errorForm").removeClass('d-none').removeClass('alert-success').removeClass('hide').addClass('alert-danger').addClass('d-block').addClass('show').html(data);
                        setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');}, 2000);
            }
    });

    });
    
    

});


