<?php require_once '../layout/header.php';?>
<input type="hidden" id="user" name="user" value="<?php echo isset($_POST['user']) ? $_POST['user'] : header('Location:'.base_url); ?>">
<div class="global-container">
<div class="col-xs-8 col-xs-offset-2 wrapper">
<button type="button" class="btn btn-primary float-right mb-2" id="taskNew" name="taskNew">New Task</button>
<br>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Date created</th>
		<th></th>
      </tr>
    </thead>
    <tbody id="myTable">
    </tbody>
  </table>
</div>
</div>
<?php require_once '../layout/footer.php'; ?>
<script src="../../assets/js/home.js"></script>
  </body>
</html>