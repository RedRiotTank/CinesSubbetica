<section class="horariosdisplay">
    		<?php
    			$displaymode = isset($_GET['tablemode']) ? $_GET['tablemode'] : 'horarios';
    			if ($displaymode === 'horarios') {
    				include('includes/horarios.inc.php');
    			} else {
    				include('includes/tarifas.inc.php');
    			}
    		?>

</section>