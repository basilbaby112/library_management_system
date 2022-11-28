<div class="container">
<p class="mb-4"> </p>
    <div class="row mb-5">
        <a href="<?php echo base_url()?>Student/list" class="btn btn-primary">Back</a>
    </div>
<h1 class="h3 mb-2 text-gray-800">Add Books</h1>
<p class="mb-4"> </p>
<?php if ($this->session->flashdata('message') != null) {  ?>
<div class="alert alert-info" role="alert">
<?php echo $this->session->flashdata('message'); ?>
</div>
<?php } ?>
<p class="mb-4"> </p>
<form method="post" action="<?php echo base_url()?>Books/add" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" value="<?php if(!empty($editData)) echo $editData->name?>" id="name" required>
    </div>
    <input type="hidden" name="id" value="<?php if(!empty($editData)) echo $editData->id?>">
    <div class="form-group col-md-6">
      <label for="author">Author</label>
      <input type="text" name="author" class="form-control" value="<?php if(!empty($editData)) echo $editData->author?>" id="author">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="edition">Edition</label>
      <input type="text" name="edition" class="form-control" value="<?php if(!empty($editData)) echo $editData->edition?>" id="edition">
    </div>
    <div class="form-group col-md-6">
      <label for="publisher">Publisher</label>
      <input type="text" name="publisher" class="form-control" value="<?php if(!empty($editData)) echo $editData->publisher?>" id="publisher" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

