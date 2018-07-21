<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2">
        	<a href="../panel_area/index.php" class="toplinks" title="CONTROL PANEL">CONTROL PANEL</a> <b> :: WEBSITE PAGES</b>
        </td>
	</tr>
	<tr>
		<td valign="top" width="25%" align="left" style="padding-top:10px;">
			<?php require_once("../other_files/leftmenu.php"); ?>
		</td>
        <td width="1%">
        </td>
		<td valign="top">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<?php
				if($_GET['task'] == "home" || $_GET['task'] == "best" || $_GET['task'] == "our_services" || $_GET['task'] == "how_to_pay" || $_GET['task'] == "terms_and_conditions" || $_GET['task'] == "privacy_policy" || $_GET['task'] == "contact_us")
				{
					if($_GET['task'] == "home")
					{
						$pagetitle = "Edit Home Page Content";
						
						$qry = mysql_query("SELECT * FROM website_pages WHERE location = 'home'");
					}
					elseif($_GET['task'] == "best")
					{
						$pagetitle = "Edit What We Do Best Page Content";
						
						$qry = mysql_query("SELECT * FROM website_pages WHERE location = 'best'");
					}
					elseif($_GET['task'] == "our_services")
					{
						$pagetitle = "Edit Our Services Page Content";
						
						$qry = mysql_query("SELECT * FROM website_pages WHERE location = 'services'");
					}
					elseif($_GET['task'] == "how_to_pay")
					{
						$pagetitle = "Edit How To Pay Page Content";
						
						$qry = mysql_query("SELECT * FROM website_pages WHERE location = 'howtopay'");
					}
					elseif($_GET['task'] == "terms_and_conditions")
					{
						$pagetitle = "Edit Terms and Conditions Page Content";
						
						$qry = mysql_query("SELECT * FROM website_pages WHERE location = 'terms'");
					}
					elseif($_GET['task'] == "privacy_policy")
					{
						$pagetitle = "Edit Home Page Content";
						
						$qry = mysql_query("SELECT * FROM website_pages WHERE location = 'privacy'");
					}
					elseif($_GET['task'] == "contact_us")
					{
						$pagetitle = "Edit Contact Us Page Content";
						
						$qry = mysql_query("SELECT * FROM website_pages WHERE location = 'contact'");
					}
					
					$result = mysql_fetch_array($qry);
				?>
				<tr>
                	<td style="padding-top:10px;">
                    	<form method="post" action="#pages" onsubmit="return Empty('content', 'Please enter page content', 'error_msg2') && saveWebPageContent('task', 'title', 'content', 'editid', 'error_msg2');">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td>
                                	<b><?php echo $pagetitle; ?> </b>
                                </td>
                            </tr>
                            <tr>
                            	<td style="padding-top:5px;">
                                	<div id="error_msg2"></div>
                                </td>
                            </tr>
                            <tr>
                            	<td style="padding-top:5px;">
                                	<textarea cols="131" rows="20" name="content" id="content"><?php echo $result['content']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                            	<td style="padding-top:10px;">
                                	<input type="hidden" name="title" id="title" value="" />
                                    <input type="hidden" name="task" id="task" value="1" />
                                    <input type="hidden" name="editid" id="editid" value="<?php echo $result['id']; ?>" />
                                	<input type="submit" value="Save Changes" />
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
                <?php		
				}
				elseif($_GET['task'] == "faqs")
				{
				?>
                <tr>
                   	<td style="padding-top:10px;">
                    	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td>
                                	<b>Edit Frequently Asked Questions Page Content</b>
                                </td>
                            </tr>
                            <tr>
                            	<td style="padding-top:10px;">
                                	[ <a href="../panel_area/website_pages.php?task=faqs&t=add" class="links" title="Add FAQ">Add FAQ</a> ] [ <a href="../panel_area/website_pages.php?task=faqs&t=view" class="links" title="View FAQs">View FAQs</a> ] 
                                </td>
                            </tr>
                            <?php
							if($_GET['t'] == "add" || $_GET['edit'])
							{
								if($_GET['edit'])
								{
									$id = base64_decode($_GET['edit']);
									
									$edit = mysql_fetch_array(mysql_query("SELECT * FROM website_pages WHERE id = '".$id."'"));
								}
							?>
                            <tr>
                                <td style="padding-top:10px;">
                                    <?php
                                    if($_GET['edit'])
                                    {
                                    ?>
                                        <b>Edit FAQ - </b> <?php echo $edit['title']; ?>
                                    <?php	
                                    }
                                    else
                                    {
                                    ?>
                                        <b>Add FAQ</b>
                                    <?php	
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                            	<td style="padding-top:10px;">
                                	<form name="faq" method="post" autocomplete="off" action="#faqs" onsubmit="return Empty('title', 'Please enter FAQ title', 'error_msg2') && Empty('content', 'Please enter FAQ content', 'error_msg2') && saveWebPageContent('task', 'title', 'content', 'editid', 'error_msg2');">
                                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td colspan="2">
                                                <div id="error_msg2"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="10%" align="right" style="padding-top:10px;">
                                                Title: &nbsp;
                                            </td>
                                            <td style="padding-top:10px;">
                                                <input type="text" name="title" id="title" size="50" value="<?php echo $edit['title']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                                Content: &nbsp;
                                            </td>
                                            <td style="padding-top:10px;">
                                                <textarea cols="115" rows="20" name="content" id="content"><?php echo $edit['content']; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" style="padding-top:10px;">
                                                
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:30px;">
                                                <input type="hidden" name="task" id="task" value="2" />
												<?php
                                                if($_GET['edit'])
                                                {
                                                ?>
                                                <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
                                                <input type="submit" value="Save Changes">
                                                <?php	
                                                }
                                                else
                                                {
                                                ?>
                                                <input type="hidden" name="editid" id="editid" value="0">
                                                <input type="submit" value="Add FAQ">
                                                <?php	
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                    </form>
                                </td>
                            </tr>
                            <?php		
							}
							else
							{
								$qry = mysql_query("SELECT * FROM website_pages WHERE location = 'faqs'");
								
								$num = mysql_num_rows($qry);
							?>
                            <tr>
                            	<td style="padding-top:10px;">
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>
                                                <b>View FAQs</b>
                                            </td>
                                            <td align="right">
                                                Found: <b><?php echo $num; ?></b>
                                            </td>
                                        </tr>
                                        <?php
                                        if($num != 0)
                                        {
                                        ?>
                                        <tr>
                                            <td style="padding-top:10px;" colspan="2">
                                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="3%" class="tdmain">
                                                            #
                                                        </td>
                                                        <td width="3%" align="center" class="tdmain">
                                                            Edit
                                                        </td>
                                                        <td class="tdmain">
                                                            FAQ
                                                        </td>
                                                        <td width="3%" align="center" class="tdmain">
                                                            Delete
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    
                                                    $counter = 1;
                                                    
                                                    while($result = mysql_fetch_array($qry))
                                                    {
                                                        if(($counter % 2) == 0)
                                                        {
                                                            $row = "evenrow";
                                                        }
                                                        else
                                                        {
                                                            $row = "oddrow";
                                                        }
                                                    ?>
                                                    <tr class="<?php echo $row; ?>">
                                                        <td class="tdother">
                                                            <b><?php echo $counter; ?></b>
                                                        </td>
                                                        <td align="center" class="tdother">
                                                            <a href="../panel_area/website_pages.php?task=faqs&edit=<?php echo base64_encode($result['id']); ?>" class="links" title="Edit FAQ - <?php echo $result['title']; ?>">Edit</a>
                                                        </td>
                                                        <td class="tdother">
                                                            <b><?php echo $result['title']; ?></b><br /><br />
                                                            <?php echo $result['content']; ?>
                                                        </td>
                                                        <td align="center" class="tdother">
                                                            <a href="#" onClick="return promptAction('Delete FAQ - <?php echo $result['title']; ?>?', '../panel_area/website_pages.php?d=<?php echo base64_encode($result['id']); ?>');" class="links" title="Delete FAQ - <?php echo $result['title']; ?>">Delete</a>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php		
                                                    }
                                                    ?>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php	
                                        }
                                        else
                                        {
                                        ?>
                                        <tr>
                                            <td style="padding-top:10px;" colspan="2">
                                                <i><b>0</b> results found!</i>
                                            </td>
                                        </tr>
                                        <?php		
                                        }
                                        ?>
                                    </table>
                                </td>
                            </tr>
                            <?php		
							}
							?>
                     	</table>
                    </td>
                </tr>
                <?php
				}
				?>
            </table>
		</td>
	</tr>
</table>