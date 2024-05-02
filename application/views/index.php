<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Users</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card card-primary">
					<div class="card-header">All Users</div>
					<div class="card-body">
						
					
				<table class="table table-bordered ">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Register at</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i = 1;
							$get = $this->UserModel->get_user();
							foreach($get->result() as $row){
								echo '<tr>
										<td>'.$i++.'</td>
										<td>'.$row->name.'</td>
										<td>'.$row->email.'</td>
										<td>'.$row->contact.'</td>
										<td>'.$row->timestamp.'</td>
										<td><a href="'.base_url('Welcome/update_user/').$row->id.'" class="btn btn-info"><i class="fa fa-edit"></i></td>
										<td><button class="btn btn-danger" onclick="deleteUser('.$row->id.')"><i class="fa fa-trash"></i></button></td>
								</tr>';
							}
						?>
					</tbody>
				</table>
				</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
	
    function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        $.ajax({
            url: '<?php echo base_url("Welcome/delete_user"); ?>',
            type: 'post',
            data: {user_id: userId},
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    // User deleted successfully, do nothing
                } else {
                    alert('Failed to delete user.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error message
                alert('user delete successfully .');
            },
            complete: function() {
                // Regardless of success or failure, reload the page
                location.reload();
            }
        });
    }
}



</script>
</body>
</html>