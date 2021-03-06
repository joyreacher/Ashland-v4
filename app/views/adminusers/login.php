<?php 
require APPROOT . '/views/inc/header.php';

?>
<?php flash('register_success');?>
<section id="contact" class="">
  
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="section-title"><?php echo $data['title']; ?></h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-3 col-md-4">
      
        <div class="info">
          <div>
            <i class="fa fa-map-marker"></i>
            <p>A108 Adam Street<br>New York, NY 535022</p>
          </div>

          <div>
            <i class="fa fa-envelope"></i>
            <p>info@example.com</p>
          </div>

          <div>
            <i class="fa fa-phone"></i>
            <p>+1 5589 55488 55s</p>
          </div>

        </div>
        
      </div>

      <div class="col-lg-5 col-md-8">
        <div>
          <form action="<?php echo URLROOT; ?>/adminusers/login" method="post" role="form" class="admin-login">
          
            <div class="form-group">
              <input autofocus  placeholder="Username" ="text" name="ad_username" class="user-form form-control" <?php echo(!empty($data['ad_username_err'])) ? 'is-invalid': ''; ?>" value="<?php echo $data['ad_username'];?>" />
              <div class="validate"></div>
            </div>
            
            <div class="form-group">
              <input type="password" placeholder="Password" name="ad_password" class="user-form form-control" <?php echo(!empty($data['ad_password_err'])) ? 'is-invalid': ''; ?>" value="<?php echo $data['ad_password'];?>" />
              <div class="validate"></div>
            </div>
            
            
            
            <div class="admin-login__button-container">
              <button class="btn" type="submit" value="Login">Login</button>
              <a href="<?php echo URLROOT; ?>/adminusers/register">No accoun? Register here.</a>
            </div>
            
          </form>
        </div>
      </div>

    </div>
  </div>
</section><!-- End Contact Section -->

<?php require APPROOT . '/views/inc/footer.php';?>