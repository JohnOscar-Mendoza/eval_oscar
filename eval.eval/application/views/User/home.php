<?php
// Bdebug::bdie($Data);
?>
<div class="container">

     <div class="row">

          <div class="col-sm-9 blog-main">

               <div class="mobile-ads hidden-lg visible-md-* visible-sm-* visible-xs-*">
                    <img src="<?php echo $ads->Data->user->image1x1; ?>" width="320" height="50" />
               </div>
               <div class="content">
                    <div class="table-responsive">
                         <table class="table" id="accountTable">
                              <thead>
                                   <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                        if($accounts->Status != 400)
                                        {
                                             foreach($accounts->Data->user as $key => $value)
                                             {
                                                  echo "
                                                  <tr>

                                                       <td><img src='".$value->imagePath."' width='50' height='50' /></td>
                                                       <td>".$value->name."</td>
                                                       <td>".$value->description."</td>

                                                  </tr>";
                                             }
                                        }
                                        else
                                        {
                                             echo "No Record Found";
                                        }
                                   ?>                   
                              </tbody>
                         </table>
                         
                    </div>


               </div>

          </div><!-- /.blog-main -->

          <div class="col-sm-2 col-sm-offset-1 blog-sidebar">

               <div class="web-ads visible-lg-* hidden-md hidden-sm hidden-xs">
                    <img src="<?php echo $ads->Data->user->image2x2; ?>" width="50px" height="320px" class="pull-right" />
               </div>


          </div><!-- /.blog-sidebar -->

     </div><!-- /.row -->

</div>
<div class="container">

     <div class="row">
          <div class="col-md-12">
               <div class="mobile-ads hidden-lg visible-md-* visible-sm-* visible-xs-*">
                    <img src="<?php echo $ads->Data->user->image1x1; ?>" width="320" height="50" />
               </div>
               <div class="web-ads visible-lg-* hidden-md hidden-sm hidden-xs">
                    <img src="<?php echo $ads->Data->user->image4x4; ?>" width="900" height="50" />
               </div>
          </div>

     </div>

</div>