<div class="container">

     <form class="form-signin" method="post">
          <h2 class="form-signin-heading">Please sign in</h2>
          <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required="" autofocus="">
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="" value="password">
          
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <a href="<?php echo base_url(); ?>login/reset">Forget Password?</a>
     </form>


</div>