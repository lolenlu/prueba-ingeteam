$(document).ready(function() {
    $('#foot').css('display','none'); 
    const base_url= $('#base_url').val();

    function viewList(){
        $.ajax({
            type: 'POST',
            url:base_url+'index.php?controller=user&action=ownTaskList',
            data:{'user': $("#user").val()},
            success:function(data){$("#myTable").html(data);},
            error: function(data) { console.log(data);}
            });
      }

      $(document).on("click","button[name='deleteButton']", function () {
        var id = $(this).attr('id');
        Swal.fire({
            title: 'Do you want to delete the task ?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url:base_url+'index.php?controller=user&action=removeTaskForUser',
                    data:{'id': id},
                    success:function(data){console.log(data);viewList();},
                    error: function(data) {console.log(data);}
                    });
            }
          })

       });

       $(document).on("click","button[name='editButton']", function () {
        var id = $(this).attr('id');
        var title_old='';
        var description_old='';
        $.ajax({
            type: 'POST',
            url:base_url+'index.php?controller=user&action=dataTaskForUser',
            data:{'id':id},
            beforeSend:function(xhr, settings){
            },
            success:function(data){
                var dat=JSON.parse(data); 
                title_old=dat.name; 
                description_old=dat.description;
                
                Swal.fire({
                    title: 'Edit task',
                    html: `<input type="text" id="title" class="swal2-input" placeholder="Title" value="`+title_old+`">
                    <input type="textarea" id="description" class="swal2-input" placeholder="Description" value="`+description_old+`">`,
                    confirmButtonText: 'Edit',
                    focusConfirm: false,
                    preConfirm: () => {
                      const title = Swal.getPopup().querySelector('#title').value
                      const description = Swal.getPopup().querySelector('#description').value
                      if (!title || !description) {
                        Swal.showValidationMessage(`All fields is required`)
                      }
                      return { title: title, description: description }
                    }
                  }).then((result) => {
                    var title=result.value.title;
                    var description= result.value.description;
                    Swal.fire({
                        title: 'Do you want to edit the task ?',
                        showCancelButton: true,
                        confirmButtonText: 'Confirm',
                      }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url:base_url+'index.php?controller=user&action=editTaskForUser',
                                data:{'id':id, 'title': title,'description':description},
                                beforeSend:function(xhr, settings){
                                },
                                success:function(data){viewList();},
                                error: function(data) {console.log(data);}
                            });
                        }
                      })
        
               });
            
            },
            error: function(data) {console.log(data);}
        });

        
    });

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#taskNew").click(function(event){
        Swal.fire({
            title: 'New task',
            html: `<input type="text" id="title" class="swal2-input" placeholder="Title">
            <input type="textarea" id="description" class="swal2-input" placeholder="Description">`,
            confirmButtonText: 'Create',
            focusConfirm: false,
            preConfirm: () => {
              const title = Swal.getPopup().querySelector('#title').value
              const description = Swal.getPopup().querySelector('#description').value
              if (!title || !description) {
                Swal.showValidationMessage(`All fields is required`)
              }
              return { title: title, description: description }
            }
          }).then((result) => {
            $.ajax({
                type: 'POST',
                url:base_url+'index.php?controller=user&action=newTaskForUser',
                data:{'email':$("#user").val(), 'title': result.value.title,'description':result.value.description},
                beforeSend:function(xhr, settings){
                },
                success:function(data){viewList();},
                error: function(data) {console.log(data);}
            });
          });
      });
      
      viewList();
});