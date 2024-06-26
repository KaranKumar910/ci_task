<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card card-primary">
					<div class="card-header">
						<h2>User Registration</h2>
					</div>
						<form class="" method="post" id="RegisterUser" >
						    <div class=""><?php echo validation_errors(); ?><div>
						    	<div id="registrationMessage"></div>
						    <div class="card-body">
						        <div class="form-group">
						            <label>Enter Name</label>
						            <input type="text" name="name" class="form-control">
						            <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
						        </div>
						        <div class="form-group">
						            <label>Enter Contact No</label>
						            <input type="number" name="contact_no" class="form-control">
						            <?php echo form_error('contact_no', '<div class="text-danger">', '</div>'); ?>
						        </div>
						        <div class="form-group">
						            <label>Enter Email</label>
						            <input type="email" name="email" class="form-control">
						            <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
						        </div>
						        <div class="form-group">
						            <label>Enter Password</label>
						            <input type="password" name="password" class="form-control">
						            <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
						        </div>
						    </div>
						    <div class="card-footer">
						        <button type="submit" class="btn btn-outline-success">Submit</button>
						    </div>
						</form>

				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#RegisterUser').submit(function(e){
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '<?=base_url('Welcome/register')?>',
                type: 'post',
                data: formData,
                dataType: 'json',
                success: function(res){
                    if (res.status) {
                        alert('Registration successful!');
                        window.location.href = '<?=base_url('Welcome/all_users')?>'; 
                    } else {
                        $('#registrationMessage').html('<div class="alert alert-danger">' + res.message + '</div>');
                    }
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText); // Log error message
                }
            });
        });
    });
</script>



</body>
</html>