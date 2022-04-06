$(document).ready(function() {
    const base_url= $('#base_url').val();
    $("#formRegister").submit(function(event){
        event.preventDefault();
        $.ajax({
                type: 'POST',
                url:base_url+'/index.php?controller=user&action=register',
                data:$('#formRegister').serializeArray(),
                dataType:'json',
                beforeSend:function(xhr, settings){
                },
                success:function(data){
                           console.log('data success: '+data);
                           $("#errorForm").removeClass('d-none').removeClass('hide').addClass('d-block').addClass('show').html('Registration completed successfully');
                            setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');}, 2000);
                
                },
                error: function(data) { 
                    console.log('data error: '+data);
                    $("#errorForm").removeClass('d-none').removeClass('hide').addClass('d-block').addClass('show').html('Incorrect registration');
                    setTimeout(function(){$("#errorForm").addClass('d-none').addClass('hide').removeClass('d-block').removeClass('show').html('');}, 2000);
                }
        });

        

    });
    
    

});