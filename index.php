<?php require('intervalsLogic.php'); ?> 

<!Doctype html>


<html>
	<head>

	    <title>Project2</title>
	    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	    <link href='styles.css' rel='stylesheet'>

	</head>

	<body>
		<div class="jumbotron container">
			<h1 class="display-3 text-center">Intervals</h1>
			<p class='message text-center'> 
				A simple app for figuring out the musical interval between two notes
			</p>
			<form method='Get' class='form-inline text-center'>
				<div class="form-group">
					<div class="lineOne">
						<label for="note">Enter your first note (required):</label>
						<input type="text" class="form-control" name='note' id='note' placeholder="C, F, G, Etc" value='<?=sanitize($note)?>'>

						<select name='accidental' id='accidental' class="form-control">
							<option value='natural' >Natural</option>
							<option value='sharp' ># (Sharp)</option>
							<option value='flat' >b (Flat)</option>
						</select>
						<br>
					</div>
					
					<div class="lineTwo">
						<label for='noteTwo'>Enter your second note (required):</label>
						<input type='text' class="form-control" name='noteTwo' id='noteTwo' placeholder="C, F, G, Etc" value='<?=sanitize($noteTwo)?>'>

						<select name='accidentalTwo' id='accidentalTwo' class="form-control">
							<option value='natural' >Natural</option>
							<option value='sharp' ># (Sharp)</option>
							<option value='flat' >b (Flat)</option>
						</select>
						<br>
					</div>

					<div class="lineThree">
						<input type='checkbox' name='octave' id='octave' <?=$octaveChecked?>>
						<label for='octave'>Add an Octave</label>
						<br>
					</div>

					<input type='submit' class='btn btn-primary' value="Find Interval">
				</div>
			</form>

			 <?php if (!empty($errors)) : ?>
        		<div class='alert alert-danger'>
            		<ul>
                		<?php foreach ($errors as $error) : ?>
                   			 <li><?=sanitize($error);?></li>
                		<?php endforeach; ?>
                	
           			 </ul>
        		</div>

    		<?php endif ?>


    		<?php if ($form->isSubmitted() and empty($errors)) : ?>
				<div class='alert alert-info text-center'>
				<?=sanitize($intervalName);?>
			<?php endif ?>
		</div>
	</body>
</html>