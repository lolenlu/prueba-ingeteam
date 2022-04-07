$(document).ready(function() {
    const base_url= $('#base_url').val();
    $("#formRegister").submit(function(event){
        event.preventDefault();
        if($("#password").val() != $("#password2").val()){  $("#errorForm").removeClass('d-none').removeClass('alert-success').removeClass('hide').addClass('alert-danger').addClass('d-block').addClass('show').html('Passwords do not match');
                                                            setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');}, 2000); return;}
        $.ajax({
                type: 'POST',
                url:base_url+'/index.php?controller=user&action=register',
                data:$('#formRegister').serializeArray(),
                dataType:'json',
                beforeSend:function(xhr, settings){
                },
                success:function(data){
                           $("#errorForm").removeClass('d-none').removeClass('alert-danger').removeClass('hide').addClass('alert-success').addClass('d-block').addClass('show').html('Registration completed successfully');
                            setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');
                             $.redirect('../../views/user/login', { user: $("#email").val(), pass : $("#password").val()});
                            }, 2000);

                },
                error: function(data) { 
                            $("#errorForm").removeClass('d-none').removeClass('alert-success').removeClass('hide').addClass('alert-danger').addClass('d-block').addClass('show').html('Incorrect registration');
                            setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');}, 2000);
                }
        });

        

    });
    
    

});