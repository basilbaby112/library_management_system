<div class="container">
<h1 class="h3 mb-2 text-gray-800">Books Issued Lists</h1>
<p class="mb-4"> </p>
    <div class="row mb-5">
        <a href="<?php echo base_url()?>Issue_book/add" class="btn btn-primary">Issue Books</a>
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
      <th scope="col">Book</th>
      <th scope="col">Student</th>
      <th scope="col">Issued Date</th>
      <th scope="col">Return period</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($issue_list as $value){?>
    <tr>
        <?php 
        $current_date=strtotime($value->issue_date );
        $cu_date1=$current_date+$value->day;
            $due_date= date('Y-m-d',strtotime($cu_date1 )) 
            
            ?>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $value->bname; ?></td>
      <td><?php echo $value->stname; ?></td>
      <td><?php echo $value->issue_date; ?></td>
      <td><?php echo $value->day; ?> Days</td>
      <td>
        <a href="<?php echo base_url()?>Issue_book/edit/<?php echo $value->id ?>" class="btn btn-primary">Edit</a>
        <a href="<?php echo base_url()?>Issue_book/delete/<?php echo $value->id ?>" class="btn btn-danger" onclick="return confirm('Do you Want Delete?')">Delete</a>
      </td>
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
</div>