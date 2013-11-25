<?php
	function bitcion_calculator_widget()
	{
		
		$calculator_options = get_option('wp_bitcoin_calculator_options');
		$url = plugins_url();
		
	?>	
		
		
		<div class="bitcoin-curreny-calculator">
		
			<div class="heading">
				<img src="<?php echo $url."/bitcoin-currency-converter/bitcoin.png"; ?>"/>&nbsp;&nbsp;Bitcoin Currency Converter
			</div>
			
			<div class="sub-heading">
				Ammount of BTC to convert
			</div>
			
			<div id="bitcoin-calculator-ammount">
				<input type="number" value="1" type="text" id="ammount-to-convert"/>
			</div>
			
			<div class="sub-heading">
				To currency:
			</div>
			
			<div class="bitcion-calculator-select">
				<?php	
		
					$currencyOptions = get_option('bitcoin_calculator_options');
										
					$items = array("USD", "GBP", "EUR");
							
					echo "<select id='calculator_dropdown_currency' name='bitcoin_calculator_options[currency]'>";
					
					foreach($items as $item) {
						$selected = ($currencyOptions['currency']==$item) ? 'selected="selected"' : '';
						
						echo "<option value='$item' $selected>$item</option>";
					}
					
					echo "</select>";
				?>
			</div>
			
			
			
			<div class="bitcoin-calculator-exchanged">
				<span class="btc-converted-amount">1BTC =</span>
			</div>
			
			<div class="bitcoin-curreny-calculator-footer">
                <div class="bitcoin-curreny-calculator-link">
                    <a href="http://wordpress.org/plugins/bitcoin-exchange-rate-ticker/screenshots/">
                        &#8250; Get the Bitcoin Calculator
                    </a>
                </div>
                <div class="bitcoin-curreny-calculator-bitcoin-address">
                    1JokP92X916fbvdT9pVdegqrt7c8hCFXJ4
                </div>
        	</div>
			
		</div>
		
		
		<script type="text/javascript">
		
			var j = jQuery.noConflict();

			j(function(){
				
				convert ();
				
				j('#calculator_dropdown_currency').change(function (){
										
					convert ();
					
				});
				
				j('#ammount-to-convert').change(function(){
				
					j('#ammount-to-convert').trigger("keyup");
				
				});
				
				j('#ammount-to-convert').keyup(function(){
				
					convert ();
				
				});
				
			});
			
			
			
			function convert ()
			{
				var url = '<?php echo bloginfo('wpurl'); ?>' + '/wp-content/plugins/bitcoin-calculator/lib/exchange/exchange.php';
								
				var a = j('#ammount-to-convert').val();
				var c = j('#calculator_dropdown_currency').val();
				
				var data = "a="+a +"&c="+c;
				
				j.ajax({
				type: 'POST',
				url: url, 
				data: data, 
				}).success(function(d) {
								
					j('.btc-converted-amount').html(d);
					
				});
			}
			
		</script>
		
	<?php
	}
	
	
?>