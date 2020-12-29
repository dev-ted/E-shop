<center>
<h1>Edit Profile Information</h1>
<p class="lead">Edit Account</p>
<p class="text-muted"> <a href="contact.php">Contact</a>  us for any queries</p>

</center>
<hr>
<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <span>Name: </span>
        <input type="text" name="name" class="form-control" required>
    </div>
    
    <div class="form-group">
        <span>Phone: </span>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <span>Country: </span>
        <input type="text" name="country" class="form-control" required>
    </div>
    <div class="form-group">
        <span>City: </span>
        <input type="text" name="city" class="form-control" required>
    </div>
    <div class="form-group">
        <span>Address: </span>
        <input type="text" name="address" class="form-control" required>
    </div>
  
    <div class="text-center">
        <button class="btn btn-primary">
            <i class="fa fa-refresh"></i> Update Profile
        </button>
    </div>
    
</form>

<?php
?>
