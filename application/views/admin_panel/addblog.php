<?php $this->load->view('admin_panel/header'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <h2 class="mt-3">Add Blog</h2>
      <form enctype="multipart/form-data" action="<?= base_url().'admin/blog/addblog_post' ?>" method="post" >     
      <div class="form-group">
        <div class="mt-3">
            <input type="text" name="blog_title" class="form-control" placeholder="Title">
        </div>
      </div>    

      <div class="form-group">
        <div class="mt-3">
              <textarea  name="blog_desc" class="form-control" placeholder="Description"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="mt-3">
              <input type="file" name="blog_img" class="form-control" placeholder="Image">
         </div>
      </div>
   
        <div class="form-group">
          <div class="mt-3">
              <input type="submit" class="btn btn-primary">
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