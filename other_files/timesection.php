<table border="0" width="100%" cellpadding="2" cellspacing="2">
	<tr>
		<td style="text-align:left;">
			<?php 
			
			$thissec = mktime();
			
			$thismoment = $thissec + (60 * 60 * 3);
			
			 $display = date("l h : ia - jS- F - Y", $thismoment); 
			 
			 echo $display;
			
			?>
		</td>
   	</tr>
</table>