<div class="container">
<p class="mb-4"> </p>
    <div class="row mb-5">
        <a href="<?php echo base_url()?>Student/list" class="btn btn-primary">Back</a>
    </div>
<h1 class="h3 mb-2 text-gray-800">Add Students</h1>
<p class="mb-4"> </p>
<?php if ($this->session->flashdata('message') != null) {  ?>
<div class="alert alert-info" role="alert">
<?php echo $this->session->flashdata('message'); ?>
</div>
<?php } ?>
<p class="mb-4"> </p>
<form method="post" action="<?php echo base_url()?>Student/add" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Student Name</label>
      <input type="text" name="name" class="form-control" value="<?php if(!empty($editData)) echo $editData->name?>" id="name" required>
    </div>
    <input type="hidden" name="id" value="<?php if(!empty($editData)) echo $editData->id?>">
    <div class="form-group col-md-6">
      <label for="cource">Cource</label>
      <input type="text" name="cource" class="form-control" value="<?php if(!empty($editData)) echo $editData->cource?>" id="cource">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" value="<?php if(!empty($editData)) echo $editData->email?>" id="email">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Mobile</label>
      <input type="text" name="phone" class="form-control" value="<?php if(!empty($editData)) echo $editData->phone?>" id="mobile" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="image">Image</label>
      <input type="file" name="image" class="form-control" id="image">
      <input type="hidden" name="old_picture" class="form-control" value="<?php if(!empty($editData)) echo $editData->image?>" id="image">
    </div>
  </div>
  <div class="form-group row <?php if(!empty($editData)){ empty($editData->image)?'cls_hidden':'cls_show';}?>">
            <label for="picturePreview" class="col-xs-3 col-form-label"></label>
            <div class="col-xs-9 col-lg-3">
                <img src="<?php  if(!empty($editData)){ echo base_url().$editData->image; } ?>" alt="image" width="150" height="150" class="img-thumbnail" />
                <!-- <button  id="delete" class="btn btn-danger">Delete</button> -->
            </div>
        </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

