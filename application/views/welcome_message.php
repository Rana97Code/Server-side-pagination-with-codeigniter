<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
     
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<table id="tabler" class="table table-striped table-bordered tabler">
		<thead>
			<tr>
				<th>Serial</th>
				<th>HS-Code</th>
				<th width="50%">Descriptions</th>
				<th>Year</th>
				
			</tr>
		</thead>
		<tbody>
		
		</tbody>
		</table> 
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<script>


 $(document).ready(function () {
    $('#tabler').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax:{ 
           url:"<?php echo base_url('Welcome/hsdetails') ?>",
           type:"POST",
           dataType: "json",
        //    success: function(data){
        //    console.log(data)
        //  }
          },
        columnDefs:[{
             targets:[0],
             orderable:false,
             }
		 ],
        
    });
 });


</script>   
</body>
</html>



