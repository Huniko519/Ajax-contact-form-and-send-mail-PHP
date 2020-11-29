<!DOCTYPE html>
<html>
<head>
    <?php require_once 'config.php'; ?>
	<title>Contact Us</title>
	<meta charset="utf-8">
	<link rel="stylesheet/less" type="text/less" href="assets/less/style-v2.less">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="wrap-form">
		<form action="sendmail.php" class="form-contact" id="form-contact" method="post" enctype="multipart/form-data">
			<span class="form-legend">Please provide your details below</span>
			<div class="form-block">
				<label for="" class="tag-label">Name</label>
				<div class="wrap-form-control">
					<input type="text" class="tag-input" name="name" placeholder="Your Name" required>
				</div>
				<div class="clr"></div>
			</div>
			<div class="form-block">
				<label for="" class="tag-label">Email</label>
				<div class="wrap-form-control">
					<input type="text" class="tag-input" placeholder="Your Email" name="email">
				</div>
				<div class="clr"></div>
			</div>
			<div class="form-block">
				<label for="" class="tag-label">Subject</label>
				<div class="wrap-form-control">
					<select name="subject" id="" class="tag-input">
						<option>Select one</option>
						<option>Support</option>
						<option>Sales</option>
						<option>Report a bug</option>
					</select>
				</div>
				<div class="clr"></div>
			</div>
			<div class="form-block">
				<label for="" class="tag-label">Message</label>
				<div class="wrap-form-control">
					<textarea class="tag-input" rows="3" name="message" placeholder="Please write your message here."></textarea>
				</div>
				<div class="clr"></div>
			</div>
			<div class="form-block">
				<label for="" class="tag-label">Gender</label>
				<div class="wrap-form-control">
					<input type="radio" id="cb1" name="gender" checked="" class="tag-input-radio" value="male">
					<label for="cb1">Male</label>
					<input type="radio" id="cb2" name="gender" class="tag-input-radio" value="female">
					<label for="cb2">Female</label>
				</div>
				<div class="clr"></div>
			</div>
			<div class="form-block">
				<label for="" class="tag-label">Upload file</label>
				<div class="wrap-form-control">
					<input type="file" class="tag-input-file" name="file_upload">
				</div>
				<div class="clr"></div>
			</div>
            <?php if(CF_RECAPTCHA): ?>
                <div class="form-block">
                    <label for="" class="tag-label"></label>
                    <div class="wrap-form-control">
                            <div class="g-recaptcha" data-sitekey="<?php echo CF_RECAPTCHA_KEY ?>"></div>
                            <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                    </div>
                    <div class="clr"></div>
                </div>
            <?php endif; ?>
			<input type="hidden" name="submit">
			<div class="form-block">
				<label for="" class="tag-label"></label>
				<div class="wrap-form-control form-control-relative">
					<button type="submit" class="tag-input-submit btn btn-warning">Submit</button>
					<div id="loading"><img src="assets/img/launcher-loader.gif" alt=""></div>
				</div>
				<div class="clr"></div>
			</div>
		</form>
	</div>

	<!-- Button trigger modal -->
	<button type="button" id="my_id" data-toggle="modal" data-target="#sendmail-modal" style="display: none;">
	  Launch modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="sendmail-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body mail-result">
					<p></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="assets/js/less.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	
</body>
</html>