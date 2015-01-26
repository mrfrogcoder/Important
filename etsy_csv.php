<?php

function makeEscape($d){
	return $d;
}
if(isset($_GET['csv']) && $_GET['csv'] !=""){
	$file_handle = fopen($_GET['csv'], "r");


//Now that we've created such a nice heading for our html table, lets create a heading for our csv table
    $csv_hdr = "RecipientName,CompanyName,Address1,	Address2,	City,	Province,	Country,	PostalCode,	ContactNo,	Email,	Commodity,	Type,	Weight,	Length,	Width,	Height,	DeclaredValue,	SpecialInstructions,	ShippersReference,	PurposeOfExport";
//Quickly create a variable for our output that'll go into the CSV file (we'll make it blank to start).
    $csv_output="";
  
// Ok, we're done with the table heading, lets connect to the database
	
//fseek($file_handle, 1); // will set the pointer to line #3
//while (($row_line = fgetcsv($file_handle, 1000, ",")) !== FALSE){
$numcols = "";
while ($line = fgetcsv($file_handle)){

  // count($line) is the number of columns
  $numcols = count($line);

  // Bail out of the loop if columns are incorrect
  break;
}


if($numcols==29){
while (!feof($file_handle) ) {
		$row_line= fgetcsv($file_handle, 1024, ",",'"');
	
		
  
	if($row_line[0]!='Sale Date'){

		    $csv_output .= makeEscape($row_line[15]) . ",	";
          //echo ""; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= "". ", ";
           //echo $row_line[16]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= makeEscape($row_line[16]) . ", ";
            //echo $row_line[17]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= makeEscape($row_line[17]) . ", ";
          
          //echo $row_line[18]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= makeEscape($row_line[18]) . ", "; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element
            //echo $row_line[19]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= makeEscape($row_line[19]) . ", "; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element
           //echo $row_line[21]; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= makeEscape($row_line[21]) . ", "; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element
             //echo $row_line[20]; //repeat for all remaining fields or columns we have headings for...
	         $csv_output .= makeEscape($row_line[20]) . ", ";
			 $csv_output .= "" . ", ";
			 $csv_output .= "". ", ";
			 $csv_output .="" . ", ";
			 $csv_output .="" . ", ";
			 $csv_output .= "" . ", ";
			 $csv_output .= "" . ", ";
			 $csv_output .= "" . ", ";
			 $csv_output .= "" . ", ";
			 $csv_output .= makeEscape($row_line[4]). ", ";
		    $csv_output .= "". ", ";
			 $csv_output .= "" . ", ";
			 $csv_output .= "" . ", ";
            $csv_output .= "" . ", \n"; //ensure the last column entry starts a new line - eto yung magbreabreak ng per td element

}
  }
        //closing while loop
     //closing if stmnt
$out = '';
//Next let's initialize a variable for our filename prefix (optional).
$filename_prefix = 'csv';
//Next we'll check to see if our variables posted and if they did we'll simply append them to out.
if ($csv_hdr) {
$out .= $csv_hdr;
$out .= "\n";
}
if ($csv_output) {
$out .= $csv_output;
$out .= "\n";
}
//Now we're ready to create a file. This method generates a filename based on the current date & time.
$filename = $filename_prefix."_".date("Y-m-d_H-i",time());
//Generate the CSV file header
header("Content-type: application/vnd.ms-excel");
header("Content-Encoding: UTF-8");
header("Content-type: text/csv; charset=UTF-8");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header("Content-disposition: filename=".$filename.".csv");
echo "\xEF\xBB\xBF"; // UTF-8 BOM
//Print the contents of out to the generated file.
echo $out;
//Exit the script
exit;
}
else{
	echo '<b>edi WOW!</b> <a href="index.php">Back</a>';	
}
}
?>
