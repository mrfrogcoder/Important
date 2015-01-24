<!DOCTYPE html><head>
<meta charset="utf-8">
<title>Orders Table</title>
</head>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="csv" value="" />
<input type="submit" name="submit" value="Save" /></form>
    <?php 
	$file_handle = fopen("EtsySoldOrderItems2015-1.csv", "r");
	?>

	<?php /*<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%"><tr class="dataTableRow">
		<th class="main" width="5%">RecipientName</th>
		<th class="main" width="10%">CompanyName</th>
		<th class="main" width="10%">Address1</th>
		<th class="main" width="5%">Address2</th>
		<th class="main" width="5%">City</th>	
		<th class="main" width="5%">Province</th>	
		 <th class="main" width="5%">Country</th>	
		<th class="main" width="5%">PostalCode</th>	
		<th class="main" width="5%">ContactNo</th>	
		<th class="main" width="5%">Email</th>	
		<th class="main" width="5%">Commodity</th>	
		<th class="main" width="5%">Type</th>	
		<th class="main" width="5%">Weight</th>	
		<th class="main" width="5%">Length</th>	
		<th class="main" width="5%">Width</th>	
		<th class="main" width="5%">Height</th>	
		<th class="main" width="5%">DeclaredValue</th>	
		<th class="main" width="5%">SpecialInstructions</th>	
		<th class="main" width="5%">ShippersReference</th>	
		<th class="main" width="5%">PurposeOfExport</th>	
	</tr> */?>
<?php
//Now that we've created such a nice heading for our html table, lets create a heading for our csv table
    $csv_hdr = "RecipientName,CompanyName,Address1,	Address2,	City,	Province,	Country,	PostalCode,	ContactNo,	Email,	Commodity,	Type,	Weight,	Length,	Width,	Height,	DeclaredValue,	SpecialInstructions,	ShippersReference,	PurposeOfExport";
//Quickly create a variable for our output that'll go into the CSV file (we'll make it blank to start).
    $csv_output="";
  
// Ok, we're done with the table heading, lets connect to the database

	
//fseek($file_handle, 1); // will set the pointer to line #3
//while (($row_line = fgetcsv($file_handle, 1000, ",")) !== FALSE){
while (!feof($file_handle) ) {
$row_line= fgetcsv($file_handle, 1024);
	
	if($row_line[0]!='Sale Date'){
?>	
       <?php
		
			//echo $row_line[15]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[15] . ", ";
			/* if(intval ($row_line[0]) ){
				  echo ($row_line[0] * 45);   
					$csv_output .= ($row_line[0] * 45) . "&#8369; , ";
				 
			 }
			 else  {
			    echo $row_line[0];
				 $csv_output .= $row_line[0]." , ";
			 }*/
			 //here we are displaying the contents of the field or column in our rows array for a particular row.
            //while we're at it we might as well store the data in comma separated values (csv) format in the csv_output variable for later use.
          
			?>
           <?php //echo ""; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= "". ", ";?>
            <?php //echo $row_line[16]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[16] . ", ";?>
            <?php //echo $row_line[17]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[17] . ", ";?>
          
            <?php //echo $row_line[18]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[18] . ", "; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element?>
            <?php //echo $row_line[19]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[19] . ", "; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element?>
            <?php //echo $row_line[21]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[21] . ", "; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element?>
             <?php //echo $row_line[20]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row_line[20] . ", \n"; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element?>
	
          
		  
<?php
}
  }
        //closing while loop
     //closing if stmnt
?>
    <!--closing the table    </table>   -->

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
