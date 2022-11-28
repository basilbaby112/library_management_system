<div class="container">
<h1 class="h3 mb-2 text-gray-800">Books Lists</h1>
<p class="mb-4"> </p>
    <div class="row mb-5">
        <a href="<?php echo base_url()?>Books/add" class="btn btn-primary">Add Books</a>
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
      <th scope="col">Book No</th>
      <th scope="col">Name</th>
      <th scope="col">Author</th>
      <th scope="col">Edition</th>
      <th scope="col">Publisher</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($list as $value){?>
    <tr>
      <th scope="row"><?php echo $value->id; ?></th>
      <td><?php echo $value->name; ?></td>
      <td><?php echo $value->author; ?></td>
      <td><?php echo $value->edition; ?></td>
      <td><?php echo $value->publisher; ?></td>
      <td>
        <a href="<?php echo base_url()?>Books/edit/<?php echo $value->id ?>" class="btn btn-primary">Edit</a>
        <a href="<?php echo base_url()?>Books/delete/<?php echo $value->id ?>" class="btn btn-danger" onclick="return confirm('Do you Want Delete?')">Delete</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>