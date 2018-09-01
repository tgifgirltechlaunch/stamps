<?php include "partials/header.php"; ?>

<h1>Add New Stamp</h1>

<form action="index.php?page=heat&action=submit" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="stampName">Name</label>
      <input id="stampName" class="form-control" type="text" name="name" placeholder="Name" required />
    </div>
    <div class="form-group col-md-6">
      <label for="stampYear">Year</label>
      <input id="stampYear" class="form-control" type="number" name="year" placeholder="Year" required />
    </div>
  </div>
  <div class="form-group">
    <label for="stampDesc">Description</label>
    <input id="stampDesc" class="form-control" type="text" name="description" placeholder="Description" required />
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="stampImage">Image URL</label>
        <input id="stampImage" class="form-control" type="url" name="image" placeholder="Image URL" required />
    </div>
    <div class="form-group col-md-6">
      <label for="stampGrade">Grade</label>
      <input id="stampGrade" class="form-control" type="text" name="grade" placeholder="Grade" required />
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
        <label for="stampWidth">Width</label>
        <input id="stampWidth" class="form-control" type="number" step="0.01" name="width" placeholder="Width (mm)" required />
    </div>
    <div class="form-group col-md-4">
        <label for="stampHeight">Height</label>
        <input id="stampHeight" class="form-control" type="number" step="0.01" name="height" placeholder="Height (mm)" required />
    </div>
    <div class="form-group col-md-4">
        <label for="stampQty">Quantity</label>
        <input id="stampQty" class="form-control" type="number" name="quantity" placeholder="Quantity" required />
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input name="album" class="form-check-input" type="checkbox" id="albumCheck">
      <label class="form-check-label" for="albumCheck">
        Album
      </label>
    </div>
  </div>
  <div class="row">
        <div class="col"><input class="btn btn-secondary" type="submit" value="Create"/></div>
  </div> 
</form>

<?php include "partials/footer.php"; ?>
