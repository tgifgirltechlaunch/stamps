<!-- Include Header -->
<?php include "partials/header.php"; ?>

<h1>Add New Stamp</h1>

<!-- Add Stamp Form -->
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
      <select id="stampGrade" name="grade" class="form-control" searchable="Grade" required>
          <option value="" class="rounded-circle-select" disabled selected>Choose your option</option>
          <option value="superb" class="rounded-circle">Superb</option>
          <option value="extremely fine" class="rounded-circle">Extremely Fine</option>
          <option value="very fine" class="rounded-circle">Very Fine</option>
          <option value="fine" class="rounded-circle">Fine</option>
          <option value="very good" class="rounded-circle">Very Good</option>
          <option value="good" class="rounded-circle">Good</option>
          <option value="fair" class="rounded-circle">Fair</option>
          <option value="poor" class="rounded-circle">Poor</option>
      </select>
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

<!-- Include Footer -->
<?php include "partials/footer.php"; ?>
