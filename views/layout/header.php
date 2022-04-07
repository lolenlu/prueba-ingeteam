<?php
session_start(); 
include_once '../../config/parameters.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
	<title>Ingeteam</title>
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../../assets/css/index.css">
</head>
<body class="align">
<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url; ?>">
<?php if(isset($_POST['user'])){ ?><div class="fixed-header"><div class="container_nav"><nav><a href="#">Panel</a></nav></div></div><?php } ?>