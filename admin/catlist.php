﻿<?php include"inc/header.php"?>
<?php include"inc/sidebar.php"?>
        <div class="grid_10">
            <div class="box round first grid">
				<h2>Category List</h2>
				<?php
				if(isset($_GET['delcat'])){
					$delid= $_GET['delcat'];
					$delquery="delete from tbl_categoty where id='$delid' ";
					$delData=$db->delete($delquery);
					if($delData){
						echo "<span style='sucsess'>  Data Deleted Successfully.. </span>";
					}else{
						echo "<span style='error'>  Data Not Deleted...</span>";
					}

				}
				
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query="SELECT * FROM tbl_categoty order by id desc";
					$category=$db->SELECT($query);
					if($category){
						$i=0;
						while($result=$category->fetch_assoc()){
									$i++;
					?>
					
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete!');" href="?delcat=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
				<?php	}	}?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
       
        <script type="text/javascript">

$(document).ready(function () {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();


});
</script>

<?php include"inc/footer.php"?>