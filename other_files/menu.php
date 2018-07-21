<?php

	$thispage = explode("/", $_SERVER['SCRIPT_NAME']);

?>
<table border="0" width="100%" cellpadding="0" cellspacing="4">
	<tr>
    	<td width="8%" align="left">
        	<a href="../home/index.php" <?php if($thispage[3] == "index.php") { echo "class=\"activemenu\""; } else { echo "class=\"inactivemenu\""; } ?>>HOME</a>
        </td>
    	<td width="15%" align="left">
        	<a href="../home/what_we_do_best.php" <?php if($thispage[3] == "what_we_do_best.php") { echo "class=\"activemenu\""; } else { echo "class=\"inactivemenu\""; } ?>>WHAT WE DO BEST</a>
        </td>
    	<td width="12%" align="left">
        	<a href="../home/services.php" <?php if($thispage[3] == "services.php") { echo "class=\"activemenu\""; } else { echo "class=\"inactivemenu\""; } ?>>OUR SERVICES</a>
        </td>
        <td width="12%" align="left">
        	<a href="../home/hr_employees.php" <?php if($thispage[3] == "hr_employees.php") { echo "class=\"activemenu\""; } else { echo "class=\"inactivemenu\""; } ?>>HR EMPLOYEES</a>
        </td>
        <td width="15%" align="left">
        	<a href="../home/wanted_persons.php" <?php if($thispage[3] == "wanted_persons.php") { echo "class=\"activemenu\""; } else { echo "class=\"inactivemenu\""; } ?>>WANTED PERSONS</a>
        </td>
    	<td width="12%" align="left">
        	<a href="../home/howtopay.php" <?php if($thispage[3] == "howtopay.php") { echo "class=\"activemenu\""; } else { echo "class=\"inactivemenu\""; } ?>>HOW TO PAY</a>
        </td>
        <td width="12%" align="left">
        	<a href="../home/contact_us.php" <?php if($thispage[3] == "contact_us.php") { echo "class=\"activemenu\""; } else { echo "class=\"inactivemenu\""; } ?>>CONTACT US</a>
        </td>
    	<td width="8%" align="left">
        	<a href="../home/faq.php" <?php if($thispage[3] == "faq.php") { echo "class=\"activemenu\""; } else { echo "class=\"inactivemenu\""; } ?>>FAQs</a>
        </td>
    </tr>
</table>