<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pixabay Lite</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url();?>">Pixabay Lite</a>
      </div>
      
      <form class="navbar-form navbar-right " action="">
        <div class="form-group">
          <input type="text" class="form-control" name="searchvalue"  placeholder="Search">
        </div>
         <div class="form-group">
           <select name="search_type" class="form-control" value="<?php echo $_GET['searchvalue'];?>" onchange="this.value">
              <option value="">Select Type</option>
              <option <?php if (@$_GET['search_type'] == 'photo') echo ' selected="selected"'; ?> value="photo">Photo</option>
              <option <?php if (@$_GET['search_type'] == 'video') echo ' selected="selected"'; ?> value="video">Video</option>
            </select>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-primary"  onclick="this.form.submit()">Search</button>
           
          </div>
      </form>
    </div>
  </nav>
  <div class="container-fluid">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="row mb-1">
      <!-- <h4>Image</h4> -->
      <?php 
      if(!empty($image_url)){
         ?>
        <h4>Image</h4>
        <?php 
        foreach ($image_url as $key => $value) {  
        // print_r( $value); 
          ?>
           <div class="col-md-3 "><img  style="margin-bottom:20px;" width="250"  height="200" src="<?php echo $value->webformatURL;?>"></div> 
          <?php 
        } 
      }?>
    </div>
    <div class="row mb-1">
      
      <?php 
      if(!empty($video_url)){ ?>
        <h4>Video</h4>
        <?php 
        foreach ($video_url as $key => $value1) 
        // print_r($video_url);
        {   
          ?>
           <div class="col-md-3 "><video width="250" height="240" controls><source src="<?php echo $value1->videos->medium->url;?>" type="video/mp4"></video></div> 
          <?php 
        }
      }
      ?>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
</div>
</body>
</html>