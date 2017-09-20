<?php 

require('helpers.php');


$noteValues = ['c' => 0, 'd' => 2, 'e' => 4, 'f' => 5, 'g' => 7, 'a' => 9, 'b'=>11];

$intervalNames = ['unison', 'Minor 2nd', 'Major 2nd', 'Minor 3rd', 'Major 3rd', 'Perfect 4th', 'Tri-Tone (Also called Augmented 4th or Diminished 5th)', 'Perfect 5th', 'Minor 6th', 'Major 6th', 'Minor 7th', 'Major 7th', 'Octave', 'Minor 9th', 'Major 9th', 'Minor 10th', 'Major 10th', 'Perfect 11th', 'Augmented 11th or Dimished 12th', 'Perfect 12th', 'Minor 13th', 'Major 13th', 'Minor 14th', 'Major 14th'];

if (isset($_GET['note'])) {
    $note = $_GET['note'];
} else {
    $note = '';
}

if (isset($_GET['accidental'])) {
    $accidental = $_GET['accidental'];
} else {
    $accidental = '';
}

if (isset($_GET['noteTwo'])) {
    $noteTwo = $_GET['noteTwo'];
} else {
    $noteTwo = '';
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







if (($note == '') || ($noteTwo == '')) {
	$alertType ='alert-danger';
	$results ='Please enter two notes';
} elseif ((!array_key_exists(strtolower($note), $noteValues)) || (!array_key_exists(strtolower($noteTwo), $noteValues ))) {
	$alertType='alert-danger';
	$results='Please enter valid musical notes';
} elseif ((array_key_exists(strtolower($note), $noteValues)) && (array_key_exists(strtolower($noteTwo), $noteValues ))) {

		$noteNum = $noteValues[strtolower($note)];
		$noteNumTwo = $noteValues[strtolower($noteTwo)];

		if ($accidental=='sharp') {
			$noteNum+=1;
			$accidentalChar = '#';
		}	elseif ($accidental == 'flat') {
			$noteNum-=1;
			$accidentalChar= 'b';
		} 	else {
			$noteNum=$noteNum;
			$accidentalChar = '';
		}

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


		if (!$octave) {
			$interval = $noteNumTwo - $noteNum;
		} else {
			$interval = ($noteNumTwo+12) - $noteNum;
		}
	$intervalName = $intervalNames[$interval];
	$alertType='alert-info';
	$results='The interval between ' .strtoupper($note) .$accidentalChar  .' and ' .strtoupper($noteTwo) .$accidentalCharTwo  .' is a ' .$intervalName;
}

