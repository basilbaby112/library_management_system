<div class="container">
<p class="mb-4"> </p>
    <div class="row mb-5">
        <a href="<?php echo base_url()?>Issue_book/list" class="btn btn-primary">Back</a>
    </div>
<h1 class="h3 mb-2 text-gray-800">Issue Books</h1>
<p class="mb-4"> </p>
<?php if ($this->session->flashdata('message') != null) {  ?>
<div class="alert alert-info" role="alert">
<?php echo $this->session->flashdata('message'); ?>
</div>
<?php } ?>
<p class="mb-4"> </p>
<form method="post" action="<?php echo base_url()?>Issue_book/add" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Student</label>
        <select class="form-control" name="student" id="exampleFormControlSelect1">
            <option value="">Select Student</option>
            <?php foreach($students as $student){?>
                <option value="<?php echo $student->id ?>" <?php if(!empty($editData)){ if($editData->student==$student->id){ echo 'selected'; }}?> ><?php echo $student->name ?></option>
            <?php }?>
        </select>
    </div>
    <input type="hidden" name="id" value="<?php if(!empty($editData)){ echo $editData->id; } ?>">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Books</label>
    <select class="form-control" name="book" id="exampleFormControlSelect1">
        <option value="">Select Book</option>
        <?php foreach($books as $book){?>
            <option value="<?php echo $book->id ?>" <?php if(!empty($editData)){ if($editData->book==$book->id){ echo 'selected'; }}?> ><?php echo $book->name ?></option>
        <?php }?>
    </select>
  </div>
  <div class="form-group col-md-6">
      <label for="name">Number of Days</label>
      <input type="text" name="day" class="form-control" value="<?php if(!empty($editData)){ echo $editData->day; }else{ echo "7"; }?>" id="day" required>
    </div>
    <?php if(!empty($editData)){?>
    <div class="form-group col-md-6">
      <label for="name">Change Status(If return the book)</label>
      <select class="form-control" name="cstatus" id="exampleFormControlSelect1">
            <option value="">select</option>
            <option value="1">Book Return</option>
            <option value="0">Book not Return</option>
      </select>
    </div>
    <?php }?>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

