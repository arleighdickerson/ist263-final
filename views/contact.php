<div id="blue">
	<div class="container">
		<div class="row">
			<h3>Contact.</h3>
		</div>
	</div>
</div>

<div id="contactwrap">
	<?php if (isset($this[FrontController::MESSAGE_SENT])) :?>
	<div class="alert alert-theme alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert">
			<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
		</button>
		<strong>Awesome!</strong> We received your message.
	</div>
	<?php endif; ?>
</div>

<div class="container mtb">
	<div class="row">
		<div class="col-lg-8">
			<h4>Talk to Anyone</h4>
			<div class="hline"></div>
			<p>At quick and dirty service stations, we take our customers seriously. Please leave us a message and we will get back to you in a timely fashion.</p>
			<form name="contact" role="form" method="post" data-toggle="validator">
				<div class="form-group">
					<label for="inputName">Your Name</label> <input type="text" class="form-control" id="inputName" name="<?= FrontController::PERSON_NAME; ?>" required />
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="inputEmail">Email address</label> <input type="email" class="form-control" id="inputEmail" name="<?= FrontController::EMAIL; ?>" email required />
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="inputSubject">Subject</label> <input type="text" class="form-control" id="inputSubject" name="<?= FrontController::SUBJECT; ?>" required />
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="inputMessage">Message</label>
					<textarea class="form-control" id="inputMessage" name="<?= FrontController::MESSAGE; ?>" rows="3"></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<button type="submit" class="btn btn-theme">Submit</button>
			</form>
		</div>
		<div class="col-lg-4">
			<h4>Talk to Corporate</h4>
			<div class="hline"></div>
			<p>
				456 Boring St.<br />Chantilly, VA 20151<br /> United States<br />
			</p>
			<p>
				Email: <a href="mailto:sayhello@arleighdickerson.us"> sayhello@arleighdickerson.us</a><br /> Tel: +1 999-999-9999
			</p>
		</div>
	</div>
</div>
