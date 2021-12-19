<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Insert a new video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="../insert/action.php"  method="POST" enctype="multipart/form-data">
            <input class="form-control mt-3" type="text" name="url" id="url" placeholder="URL" aria-label="default input example" required>
            <input class="form-control mt-3 mb-3" type="text" name="tags" id="tags" placeholder="Tags" aria-label="default input example" required>
            <input type="submit" value="Insert" class="btn btn-success">
          </form>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>