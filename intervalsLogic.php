<?php 

require('helpers.php');

/* Creates an array that assigns scaler values to each of the natural notes 
(Sharps and Flats will be implemented later) */
$noteValues = ['c' => 0, 'd' => 2, 'e' => 4, 'f' => 5, 'g' => 7, 'a' => 9, 'b'=>11];

/*Creates an array that attches the name of the interval to the number of chromatic steps 
the interval is comprised of. Because arrays start at 0 by default, and the Unison interval starts at 0, we do not need to implement our own keys. */
$intervalNames = ['Unison', 'Minor 2nd', 'Major 2nd', 'Minor 3rd', 'Major 3rd', 'Perfect 4th', 'Tri-Tone (Also called Augmented 4th or Diminished 5th)', 'Perfect 5th', 'Minor 6th', 'Major 6th', 'Minor 7th', 'Major 7th', 'Octave', 'Minor 9th', 'Major 9th', 'Minor 10th', 'Major 10th', 'Perfect 11th', 'Augmented 11th or Dimished 12th', 'Perfect 12th', 'Minor 13th', 'Major 13th', 'Minor 14th', 'Major 14th'];

/*Series of if states that check for user inputs. This prevents errors from showing up when the page is first loaded and there are no inputs. */ 
if (isset($_GET['note'])) {
    $note = $_GET['note'];
} else {
    $note = '';
}

if (isset($_GET['noteTwo'])) {
    $noteTwo = $_GET['noteTwo'];
} else {
    $noteTwo = '';
}

if (isset($_GET['accidental'])) {
    $accidental = $_GET['accidental'];
} else {
    $accidental = '';
}

if (isset($_GET['accidentalTwo'])) {
    $accidentalTwo = $_GET['accidentalTwo'];
} else {
    $accidentalTwo = '';
}

if (isset($_GET['octave'])) {
    $octave = true;
} else {
    $octave = false;
}


/*Code for error messages depending on User's inputs. 
   If no errors, procedes to calculate intervals. */
if (($note == '') || ($noteTwo == '')) {
	$alertType ='alert-danger';
	$results ='Please enter two notes';
} elseif ((!array_key_exists(strtolower($note), $noteValues)) || (!array_key_exists(strtolower($noteTwo), $noteValues ))) {
	$alertType='alert-danger';
	$results='Please enter valid musical notes';
} elseif ((array_key_exists(strtolower($note), $noteValues)) && (array_key_exists(strtolower($noteTwo), $noteValues ))) {

		#Makes sure input isn't case sensitive and converts the user's note into its scaler value. 
		$noteNum = $noteValues[strtolower($note)];
		$noteNumTwo = $noteValues[strtolower($noteTwo)];

		
		if ($accidental=='sharp') { #Adds one to the scaler value if the note is sharp
			$noteNum+=1;
			$accidentalChar = '#';
		}	elseif ($accidental == 'flat') { #Subtracts one from the scaler value if the note is flat
			$noteNum-=1;
			$accidentalChar= 'b';
		} 	else {						#keeps the scaler value the same if it is natural
			$noteNum=$noteNum;  
			$accidentalChar = '';
		}

		#Same loop as above but for second note
		if ($accidentalTwo=='sharp') { 
			$noteNumTwo+=1;
			$accidentalCharTwo = '#';
		}	elseif ($accidentalTwo == 'flat') {
			$noteNumTwo-=1;
			$accidentalCharTwo = 'b';
		} 	else {
			$noteNumTwo=$noteNumTwo;
			$accidentalCharTwo = '';
		}

		/*Subtracts the second scaler from the first scaler (does it +12 if the octave box is checked) to get the interval between them in scaler form, which corresponds to the IntervalNames array implemented at the top. */
		if (!$octave) {
			$interval = $noteNumTwo - $noteNum;
		} else {
			$interval = ($noteNumTwo+12) - $noteNum;
		}

	$intervalName = $intervalNames[$interval];  #Stores the interval name as a variable
	$alertType='alert-info';

	#Concatenates and steralizes all the variables to output on the display
	$results='The interval between ' .sanitize(strtoupper($note)) .sanitize($accidentalChar)  .' and ' .sanitize(strtoupper($noteTwo)) .sanitize($accidentalCharTwo)  .' is a ' .sanitize($intervalName);

}

