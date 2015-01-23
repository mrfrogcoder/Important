<!DOCTYPE html><head>
<meta charset="utf-8">
<title>Orders Table</title>
</head>
    <?php 
	$file_handle = fopen("EtsySoldOrders2015-12.csv", "r");
	?>
<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
	<tr class="dataTableRow">
		<th class="main" width="5%">Price</th>
		<th class="main" width="10%">Ordered By</th>
		<th class="main" width="10%">Email</th>
		<th class="main" width="5%">Ordered On</th>
		<th class="main" width="5%">Completed On</th>	
	</tr>
<?php
//Now that we've created such a nice heading for our html table, lets create a heading for our csv table
    $csv_hdr = "Order ID, Ordered By, Email, Order Date, Completed Date";
//Quickly create a variable for our output that'll go into the CSV file (we'll make it blank to start).
    $csv_output="";
  
// Ok, we're done with the table heading, lets connect to the database

	
  while (!feof($file_handle) ) {
	$row_line= fgetcsv($file_handle, 1024);
?> 
        <tr>
            <td align="left" valign="center">
            <br><?php
			 if(intval ($row_line[0]) ){
				  echo ($row_line[0] * 45);   
					$csv_output .= ($row_line[0] * 45) . "&#8369; , ";
				 
			 }
			 else  {
			    echo $row_line[0];
				 $csv_output .= $row_line[0]." , ";
			 }
			 //here we are displaying the contents of the field or column in our rows array for a particular row.
            //while we're at it we might as well store the data in comma separated values (csv) format in the csv_output variable for later use.
          
			?>
            </td>
            <td align="left" valign="center">
            <br><?php echo $row_line[4]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[4] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php echo $row_line[5]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[5] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php echo $row_line[3]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[3] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php echo $row_line[4]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[4] . ", \n"; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element?>
             </td>
          </tr>
<?php
  }
        //closing while loop
     //closing if stmnt
?>
    <!--closing the table-->
    </table>   
<?php
/*
Here is the important part. we've got the 2 variables (csv_hdr & csv_output) to create our csv file, but we can't do it in this file.
Why? Because the header for this file has already been sent and will show up in our csv file if we generate it on this page. We don't
want any html header in our csv file, so we've got to post our 2 variables to another php page (export.php) on which we generate our csv
file.

Here's the code for a form & button that'll post our 2 variables as hidden _POST to export.php.
*/
?>
<br />
<center>
<form name="export" action="export.php" method="post">
    <input type="submit" value="Export table to CSV">
    <input type="hidden" value="<?php echo $csv_hdr; ?>" name="csv_hdr">
    <input type="hidden" value="<?php echo $csv_output; ?>" name="csv_output">
</form>
</center>
</html>
