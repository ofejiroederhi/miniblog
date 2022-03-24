<?php $this->load->view('admin_panel/header'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   
      <h2 class="mt-3">Edit Blog</h2>
      <form enctype="multipart/form-data" action="<?= base_url().'admin/blog/editblog_post' ?>" method="post" >     
      <div class="form-group">
        <div class="mt-3">
            <input type="text" value="<?= $result[0]['blog_title'] ?>" name="blog_title" class="form-control" placeholder="Title">
        </div>
      </div>    

      <div class="form-group">
        <div class="mt-3">
            <input type="hidden" value="<?= $result[0]['blog_id'] ?>" name="blog_id" class="form-control" placeholder="ID">
        </div>
      </div>   

      <div class="form-group">
        <div class="mt-3">
              <textarea  name="blog_desc" class="form-control" placeholder="Description"><?= $result[0]['blog_desc'] ?> </textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="mt-3">
              <img src="<?=base_url().$result[0]['blog_img']?>" class='img-fluid' width='100'>
              <input type="file" name="blog_img" class="form-control" placeholder=" Change Image">
         </div>
      </div>
      <div class="row">
        <div class="col-sm">
        <div class="form-group">
          <div class="mt-3">
              <input type="submit" class="btn btn-primary">
          </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
          <div class="mt-3">
              <input type="submit" value="Delete" class="btn btn-danger">
          </div>
        </div>
</div>
</div>
      </form>
    </main>

  </div>
</div>

<?php $this->load->view('admin_panel/footer'); ?>

<script type="text/javascript">
        <?php
        if(isset($_SESSION['inserted']))
        {
          echo "alert('Submitted Successfully')";
        }elseif(isset($_SESSION['failedinsert'])){
          echo "alert('$error');";
          redirect('admin/blog/addblog');
          // echo "alert('Error')";
        }
        ?>
</script>