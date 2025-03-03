<?php

    $con = new mysqli("localhost", "root", "", "database");
	?>






<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <style>
        .table__header{
            margin-left:20%;
        }
.table-responsive{
    display:flex;
    justify-content:center;
}        
#student {
  
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#student td, #student th {
  border: 1px solid #ddd;
  padding: 8px;
}

#student tr:nth-child(even){background-color: #f2f2f2;}

#student tr:hover {background-color: #ddd;}

#student th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
 

  </head>

  
 
  <body>




  <main class="table">
        <section class="table__header">
            <h1>Data</h1>
            
        </section>
        <section class="table__body">
		<div class="card-body">
	<div class="table-responsive">
		<table id="student">
			<thead>
				<th>SlNo</th>
                <th>Ktu_Id</th>
				<th>FileName</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$sql = "select * from details";
					$result = mysqli_query($con, $sql);
					$c=1;			
					if ($result->num_rows > 0) {	
					while($row = $result->fetch_assoc()) {
					
						echo "<tr>";
						echo "<td>".$c."</td>";		
						echo "<td>".$row['ktu_id']."</td>";		
				
						echo "<td>".$row['certificate']."</td>";	
					
						echo '<td><a href="pdf/'.$row['certificate'].'" class="btn btn-info" download><h3 style="color:black;">Download</h3></a></td>';					
						echo "</tr>";
						$c++;					
					} }				
						else {						
						echo "<tr><td colspan='3'>No records found. </td></tr>";						
						}						
			?>
			</tbody>
		</table>			
	</div>
</div>

        </section>
    </main>


    <script>


  </body>
</html>

