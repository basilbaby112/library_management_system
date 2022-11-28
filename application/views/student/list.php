<div class="container">
<h1 class="h3 mb-2 text-gray-800">Students Lists</h1>
<p class="mb-4"> </p>
    <div class="row mb-5">
        <a href="<?php echo base_url()?>Student/add" class="btn btn-primary">Add Student</a>
    </div>
    <?php if ($this->session->flashdata('message') != null) {  ?>
<div class="alert alert-info" role="alert">
<?php echo $this->session->flashdata('message'); ?>
</div>
<?php } ?>
<p class="mb-4"> </p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Name</th>
      <th scope="col">Photo</th>
      <th scope="col">Cource</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($list as $value){?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $value->name; ?></td>
      <td><img src="<?php echo base_url(); echo $value->image ?>" alt="image"></td>
      <td><?php echo $value->cource; ?></td>
      <td><?php echo $value->email; ?></td>
      <td><?php echo $value->phone; ?></td>
      <td>
        <a href="<?php echo base_url()?>Student/edit/<?php echo $value->id ?>" class="btn btn-primary">Edit</a>
        <a href="<?php echo base_url()?>Student/delete/<?php echo $value->id ?>" class="btn btn-danger" onclick="return confirm('Do you Want Delete?')">Delete</a>
      </td>
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
</div>