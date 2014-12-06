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
			<h4>Just Get In Touch!</h4>
			<div class="hline"></div>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
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
			<p>Bacon ipsum dolor amet ham pork loin porchetta, cupim landjaeger kevin flank beef ribs kielbasa bacon beef. Picanha turkey landjaeger chuck, pancetta tail ham hock meatball kielbasa doner prosciutto turducken. Pastrami short ribs kielbasa chicken tri-tip shank turducken bresaola tenderloin
				swine ground round drumstick leberkas cupim. Pork belly boudin beef ribs strip steak fatback. Chicken pork chop pork loin, jerky alcatra hamburger pig.</p>
		</div>
	</div>
</div>
