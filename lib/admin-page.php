<?php



function bitcoin_calculator_html ()

{		

?>

	<h2>

		Bitcoin Currency Converter

	</h2>

    <div>

    	<form action="options.php" method="post">

			<?php settings_fields('bitcoin_calculator_options'); ?>

            <?php do_settings_sections('bitcoin_calculator_settings_page'); ?>

            <p class="submit">

                <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />

            </p>

        </form>

    	

    </div>

	

	<h3>

    	If you like this plugin please donate BTC: 1JokP92X916fbvdT9pVdegqrt7c8hCFXJ4

    </h3>



<?php

}

?>