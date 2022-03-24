<?php $this->load->view('admin_panel/header'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <h2>View Blog</h2>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($result){
              $counter=1;
              foreach($result as $key=>$value){
              echo"
              <tr>
              <td>".$counter."</td>
              <td>".$value['blog_title']."</td>
              <td>".$value['blog_desc']."</td>
              <td><img src='".base_url().$value['blog_img']."' class='img-fluid' width='100'></td>
              <td><a class=\"btn btn-info\" href='".base_url().'admin/blog/edit/'.$value['blog_id']."'>Edit</a></td>
              <td><a class=\"btn btn-danger\" href='".base_url().'admin/blog/delete/'.$value['blog_id']."'>Delete</a></td>
            </tr>";

                $counter++;
              }


            }else{
              echo "<a href='".$link_address."'>Link</a>";
              echo "<tr><td colspan='6' class=\"text-center\">No record found</td><tr>";
            }

            ?>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

<?php $this->load->view('admin_panel/footer'); ?>
<script type="text/javascript">
        <?php
        if(isset($_SESSION['inserted']))
        {
          echo "alert('Updated Successfully')";
        }elseif(isset($_SESSION['failedinsert'])){
          echo "alert('$error');";
          redirect('admin/blog/addblog');
          // echo "alert('Error')";
        }
        ?>
      </script>