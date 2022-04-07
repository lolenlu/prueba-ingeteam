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

        //PROCESS REMOVE

       });

       $(document).on("click","button[name='editButton']", function () {
        var id = $(this).attr('id');

        //PROCESS EDIT

        
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