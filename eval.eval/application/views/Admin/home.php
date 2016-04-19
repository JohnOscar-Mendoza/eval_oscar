<?php
// Bdebug::bdie($Data);
?>
<div class="container">

     <div class="row">
          <div class="col-md-12">
               <form class="form-inline" method="post" action="<?php echo base_url(); ?>admin/home/limits">
                    <div class="form-group">
                         <label for="exampleInputName2">Limit</label>
                         <input type="text" class="form-control" id="exampleInputName2" placeholder="Password Expiry" name="limit">
                    </div>
                    <input type="hidden" name="userId" value="<?php echo $_GET["userId"]; ?>" >
                    <button type="submit" class="btn btn-default">Submit</button>
               </form>
          </div>
     </div>

     <div class="row">
          <div class="col-md-12">
               <form class="form-inline" method="post" action="<?php echo base_url(); ?>admin/home/reset">
                    <div class="form-group">
                         <label for="exampleInputName2">Reset Password</label>
                         <input type="hidden" name="userId" value="<?php echo $_GET["userId"]; ?>" >
                         <input type="email" class="form-control" id="exampleInputName2" placeholder="Email" name="email">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
               </form>
          </div>
     </div>

     <div class="row">
          <div class="col-md-12">
               <form class="form-inline" method="post" action="page_limit">
                    <div class="form-group">
                         <label for="exampleInputName2">Page Limit</label>
                         <input type="hidden" name="userId" value="<?php echo $_GET["userId"]; ?>" >
                         <input type="email" class="form-control" id="exampleInputName2" placeholder="Page Limit" name="page_limit">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
               </form>
          </div>
     </div>
     <br/>
     <div class="row">
          <div class="col-md-12">
               <h2>Upload Photo</h2>
               <form class="form" method="post" action="<?php echo base_url(); ?>admin/home/upload" enctype='multipart/form-data'>
                    <div class="form-group">

                         <label for="exampleInputName2">Upload 1x1</label>
                         <input type="file" class="form-control" id="exampleInputName2" placeholder="Password Expiry" name="image1x1">
                         <label for="exampleInputName2">Upload 2x2</label>
                         <input type="file" class="form-control" id="exampleInputName2" placeholder="Password Expiry" name="image2x2">
                         <label for="exampleInputName2">Upload 3x3</label>
                         <input type="file" class="form-control" id="exampleInputName2" placeholder="Password Expiry" name="image3x3">
                         <label for="exampleInputName2">Upload 4x4</label>
                         <input type="file" class="form-control" id="exampleInputName2" placeholder="Password Expiry" name="image4x4">
                    </div>
                    <input type="hidden" name="userId" value="<?php echo $_GET["userId"]; ?>" >
                    <button type="submit" class="btn btn-default">Submit</button>
               </form>
          </div>
     </div>

</div>