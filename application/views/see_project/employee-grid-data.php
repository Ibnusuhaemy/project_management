<?php
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id_project', 
	1 => 'no_project',
	2 => 'nama_project',
	3 => 'id_sumber_project', 
	4 => 'id_status_project',
	5 => 'id_client', 
	6 => 'id_kategori_client'
	);




// getting total number records without any search
$sql = "SELECT id_project, no_project, nama_project, id_sumber_project, id_status_project, id_client, id_kategori_client ";
$sql.=" FROM project";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT id_project, no_project, nama_project, id_sumber_project, id_status_project, id_client, id_kategori_client ";
$sql.=" FROM project WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
$sql.=" AND ( id_project LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR no_project LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama_project LIKE '".$requestData['search']['value']."%' )";
$sql.=" OR id_sumber_project LIKE '".$requestData['search']['value']."%' )";
$sql.=" OR id_status_project LIKE '".$requestData['search']['value']."%' )";
$sql.=" OR id_client LIKE '".$requestData['search']['value']."%' )";
$sql.=" OR id_kategori_client LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length. */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id_project"];
	$nestedData[] = $row["no_project"];
	$nestedData[] = $row["nama_project"];
	$nestedData[] = $row["id_sumber_project"];
	$nestedData[] = $row["id_status_project"];
	$nestedData[] = $row["id_client"];
	$nestedData[] = $row["id_kategori_client"];
	
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
