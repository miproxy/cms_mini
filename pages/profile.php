<!-- Include header -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/components/header.php') ?>
<!-- Include main layout (navigation...) -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/main_layer.php') ?>

<div class="container">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
      <div class="hovereffect">
        <?php
          if (file_exists($_SERVER['DOCUMENT_ROOT'].'/cms_mini/assets/img/profile.jpg')) {
            echo '<img src="/cms_mini/assets/img/profile.jpg" class="img-thumbnail img-responsive">';
          } else {
            echo '<img src="/cms_mini/assets/img/default.png" class="img-thumbnail img-responsive">';
          }
        ?>
        <div class="overlay">
            <p data-toggle="modal" data-target="#exampleModal">Change profile picture</p>
        </div>
      </div>
      <p id="username_info" class="text-center py-2">@username</p>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8">
      <h3 class="pb-4"><b>My profile</b></h3>
      <form>
        <div class="form-group row">
          <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="first_name" placeholder="First Name">
          </div>
        </div>
        <div class="form-group row">
          <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="last_name" placeholder="Last Name">
          </div>
        </div>
        <div class="form-group row">
          <label for="personal_description" class="col-sm-2 col-form-label">Personal Description</label>
          <div class="col-sm-10">
            <textarea type="text" class="form-control" id="personal_description" rows="3"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="private">
            <label class="form-check-label" for="private">
              Make this profile <b>private</b>
            </label>
          </div>
        </div>
        <hr class="mt-5">
        <button type="submit" class="btn btn-primary float-right">Update Profile</button>
      </form>
    </div>
  </div>
</div>

<!-- BEGIN Upload picture modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/cms_mini/controllers/upload_img_controller.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="fileToUpload">Select image to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>
          <input type="submit" class="btn btn-primary float-right" value="Upload Image" name="submit">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Upload picture modal -->

<!-- Include footer -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/components/footer.php') ?>
