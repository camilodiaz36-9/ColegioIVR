<?php

class CommonOps{
	public function tomarOpcion($result,$pagiClient){
		if ($result->isTimeout()) {
		    // The user did not interrupt the play
		} else {
		    // The user interrupted the play
		    $digits = $result->getDigits(); // Get what the user pressed
		    $pagiClient->sayDigits($digits);
		}
	}
}

?>