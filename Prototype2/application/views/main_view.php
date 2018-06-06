

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>


 <div class="container">
     <br /> <br /> <br />
     <h3 align="center">Brainilio CRUD</h3><br>

     <form method="post" action="<?php echo base_url()?>index.php/main/form_validation">
        <?php
        if($this->uri->segment(2) == "inserted")
        {

            echo '<p class="text-success">Data inserted</p>';
        }
        ?>


         <?php
         if(isset($user_data))
         {
             foreach($user_data->result() as $row)
             {
                ?>

         <div class="form-group">
             <label>Enter First Name</label>
             <input type="text" name="first_name" class="form-control" value="<?php echo $row->firstname; ?>"
             <span class="text-danger">
                 <?php echo form_error("first_name"); ?>
             </span>
         </div>
         <div class="form-group">
             <label>Enter Last Name</label>
             <input type="text" name="last_name" class="form-control" value="<?php echo $row->lastname; ?>"/>
             <span class="text-danger">
                 <?php echo form_error("last_name"); ?>
             </span>
         </div>
         <div class="form-group">
             <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>"/>
             <input type="submit" name="update" value="Update" class="btn btn-info"/>
         </div>
     </form>
 </div>
<?php
             }
         }
         else {


             ?>
             <div class="form-group">
                 <label>Enter First Name</label>
                 <input type="text" name="first_name" class="form-control"/>
                 <span class="text-danger">
                 <?php echo form_error("first_name"); ?>
             </span>
             </div>
             <div class="form-group">
                 <label>Enter Last Name</label>
                 <input type="text" name="last_name" class="form-control"/>
                 <span class="text-danger">
                 <?php echo form_error("last_name"); ?>
             </span>
             </div>
             <div class="form-group">
                 <input type="submit" name="insert" value="Insert" class="btn btn-info"/>
             </div>
             <?php

         }
         ?>
    </form>
</div>
 <br /> <br />


 <h3 align="center">Update of Delete</h3>
 <br><br>

<div class="container">
 <div class="table-responsive">
     <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th class="p-3 mb-2 bg-warning text-dark">UPDATE</th>
                    <th class="p-3 mb-2 bg-danger text-white"j>DELETE</th>

                </tr>
         <?php
         if($fetch_data->num_rows() > 0)
         {
             foreach($fetch_data->result() as $row) {
                 ?>
                 <tr>
                     <td><?php echo $row->id; ?></td>
                     <td><?php echo $row->firstname; ?></td>
                     <td><?php echo $row->lastname; ?></td>
                     <td><a href="<?php echo base_url(); ?>index.php/main/update_data/<?php echo $row->id; ?>">UPDATE</a></td>
                     <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">DELETE</a></td>

                 </tr>
                 <?php
             }
         }
         else
         {
             ?>
             <tr>
         <td colspan = "3">No data Found</td>
         </tr>
             <?php
         }
            ?>
     </table>
 </div>
</div>



</body>
<script>
    $(document).ready(function() {
        $('.delete_data').click(function(){
            var id = $(this).attr("id");
            if(confirm("Are you sure you want to delete this?"))
            {
                window.location="<?php echo base_url(); ?>index.php/main/delete_data/" + id;
            }
            else
            {
                return false;
            }
        });
    });
</script>
</html>