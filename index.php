

<!Doctype html>


<html>
	<head>

	    <title>Project2</title>
	    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	    <link href='styles.css' rel='stylesheet'>

	</head>

	<body>

			<h1>Intervals</h1>

			<form method='Get'>

				<label for='note'>Enter your first note</label>
				<input type='text' name='note' id='note'>

				<select name='accidental' id='accidental'>
					<option value='natural' >Natural</option>
					<option value='sharp' ># (Sharp)</option>
					<option value='flat' >b (Flat)</option>
				</select>
				<br>

				<label for='note'>Enter your second note</label>
				<input type='text' name='noteTwo' id='noteTwo'>

				<select name='accidentalTwo' id='accidentalTwo'>
					<option value='natural' >Natural</option>
					<option value='sharp' ># (Sharp)</option>
					<option value='flat' >b (Flat)</option>
				</select>
				<br>

				<input type='checkbox' name='octave' id='octave'>
				<label for='octave'>Add an Octave</label>
				<br>



				<input type='submit' class='btn btn-primary btnsmall' value="Find Interval">

			</form>

			
	</body>
</html>