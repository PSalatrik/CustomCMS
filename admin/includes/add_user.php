<?php

if(isset($_POST['add_user'])){

	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$username = $_POST['username'];

	//$post_image = $_FILES['post_image']['name'];
	//$post_image_temp = $_FILES['post_image']['tmp_name'];

	$user_email = $_POST['user_email'];
	$user_role = $_POST['user_role'];
	$user_password = $_POST['user_password'];
	//$post_date = date('d-m-y');
//	$post_comment_count = 4;

	$query = "SELECT randSalt FROM users";
	$select_randsalt_query = mysqli_query($connection, $query);
	if(!$select_randsalt_query ) {
		die("You blew it" . mysqli_error($connection));
	}

	$row = mysqli_fetch_array($select_randsalt_query);
	$salt = $row['randSalt'];
	$hashed_password = crypt($user_password, $salt);

	//move_uploaded_file($post_image_temp, "../images/$post_image ");

	$query = "INSERT INTO users( user_firstname, user_lastname, username, user_email, user_role, user_password ) ";
	$query .= "VALUES( '{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_email}', '{$user_role}', '{$hashed_password}') ";


	$create_user_query = mysqli_query($connection, $query);

	confirm($create_user_query);

		echo "User created: " . " " . "<a href='users.php'>Check it out</a>" ; 






}

?>



<form action="" method="post" enctype="multipart/form-data">

		<div class='fprm-group'>
			<label for="user_firstname">First Name</label>
			 <input type="text" class="form-control" name="user_firstname">
		</div>

		<div class="form-group">
			<label for="user_lastname">Last Name</label>
			 <input type="text" class="form-control" name="user_lastname">
		</div>

				<div class="form-group">
			<select name="user_role" id="">
				
				<option value="select_options">Select Options</option>

				<option value="Admin">Admin</option>
				<option value="Subscriber">Subscriber</option>

			</select>

				</div>

		

		<div class="form-group">
			<label for="username">Username</label>
			 <input type="text" class="form-control" name="username">
		</div>

		<div class="form-group">
			<label for="user_email">Email</label>
			 <input type="email" class="form-control" name="user_email">
		</div>

		<div class="form-group">
			<label for="user_passwords">Password</label>
			 <input type="password" class="form-control" name="user_password">
			 </textarea>
		</div>

		<div>
			<input class="btn btn-primary" type="submit" name="add_user" value="Create User">
		</div>
</form>