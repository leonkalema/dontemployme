<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
    	<td width="31%">
        	<input type="text" size="50" name="search_q" id="search_q" />
            <input type="hidden" name="search_l" id="search_l" value="<?php echo $_GET['t']; ?>" />
        </td>
        <td>
        	<input type="button" value="Find Transaction" onClick="return Empty('search_q', 'Please enter search text', 'error_msg') && findMyTransaction('search_q', 'search_l', 'disp_area');" />
        </td>
    </tr>
    <tr>
    	<td style="padding-top:5px;">
        	<div id="error_msg"></div>
        </td>
    </tr>
</table>