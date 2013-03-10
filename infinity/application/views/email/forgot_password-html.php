<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create a new password on <?php echo site_url();?></title>
</head>
<body>
	<a href="<?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?>"> Create a new password</a>
	<a href="<?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?>"><?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?></a>
	<br>
	ou received this email, because it was requested by a <a href="<?php echo site_url(''); ?>" style="color: #3366cc;"><?php echo $site_name; ?></a> user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same.<br />
</body>
</html>