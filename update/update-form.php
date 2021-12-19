<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropForEdit">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdropForEdit<?php echo $id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <?php
          include("../database.php");
          $updatId = $id;
          $valuesSql = "SELECT `url`,`tags`, `sequence` FROM ytfvo WHERE sequence = $updatId";
          $values =  $conn->query($valuesSql);
          ?>
          <form action="../update/action.php"  method="POST" enctype="multipart/form-data">
          <?php 
          if ($values->num_rows>0) {
            $editValues = $values->fetch_assoc();
            echo'
            <input class="form-control mt-3" type="text" name="url" id="url" placeholder="URL" aria-label="default input example" value="'.$editValues['url'].'" required>
            <input class="form-control mt-3 mb-3" type="text" name="tags" id="tags" placeholder="Tags" aria-label="default input example" value="'.$editValues['tags'].'" required>
            <input type="number" name="sequence" id="sequence" value="'.$editValues['sequence'].'" hidden><br/>
            <input type="submit" value="Update" class="btn btn-success">
            ';
          }
            ?>
          </form>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>