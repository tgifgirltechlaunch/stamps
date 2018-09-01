<?php include "partials/header.php"; ?>
<form name="searchfrm" action="index.php?page=heat&action=submitSearch" method="post">
    <div style="padding: 30px 0;" class="col-md-6">
        <div class="input-group">
            <div class="input-group-btn searchselect">
                <select name="field" class="btn btn-secondary dropdown-toggle" searchable="Search here..">
                    <option value="default" class="rounded-circle-select" disabled selected>Choose your option</option>
                    <option value="name" class="rounded-circle">Name</option>
                    <option value="year" class="rounded-circle">Year</option>
                    <option value="id" class="rounded-circle">ID</option>
                    <option value="width" class="rounded-circle">Width</option>
                    <option value="height" class="rounded-circle">Height</option>
                    <option value="grade" class="rounded-circle">Grade</option>
                    <option value="description" class="rounded-circle">Description</option>
                </select>
            </div>
            <input name="term" type="text" class="form-control" placeholder="Value">
            <span class="input-group-addon" onclick="document.forms['searchfrm'].submit();"><i class="fas fa-search fa-search-icon"></i></span>
        </div>
    </div>
</form>

<h1>Stamp Album</h1>
<p><?= Album::$albumname ?> of <?= Album::$season ?></p>
<table class="table table-striped">
    <tr id="sortHeader">
        <th colspan="5"><h5>SORT OPTIONS</h5></th>
        <th colspan="2"><h5>YEAR</h5><a class="" href="index.php?page=heat&action=sortYearDesc"><i class="fas fa-sort-amount-down"></i> </a>
            <a class="" href="index.php?page=heat&action=sortYearAsc"> <i class="fas fa-sort-amount-up"></i></a></th>
        <th colspan="2"><h5>DUPLICATES</h5><a class="" href="index.php?page=heat&action=sortDuplicatesDesc"><i class="fas fa-sort-amount-down"></i> </a>
            <a class="" href="index.php?page=heat&action=sortDuplicatesAsc"> <i class="fas fa-sort-amount-up"></i></a></th>
        <th colspan="3"><h5>ALBUM</h5><a class="" href="index.php?page=heat&action=sortAlbumTrue"><i class="fas fa-equals"></i> </a>
            <a class="" href="index.php?page=heat&action=sortAlbumFalse"> <i class="fas fa-not-equal"></i></a></th>
    </tr>
    
    <tr>
        <th>Name</th>
        <th>Desc</th>
        <th>Year</th>
        <th>Width</th>
        <th>Height</th>
        <th>Quantity</th>
        <th>Album</th>
        <th>Grade</th>
        <th>Image</th>
        <th>Remove</th>
        <th>Subtract</th>
        <th>Increment</th>
    </tr>
    <?php foreach(Album::$collection as $c) { ?>
        <tr>
            <td><?= $c->name ?></td>
            <td><?= $c->description ?></td>
            <td><?= $c->year ?></td>
            <td><?= $c->width ?></td>
            <td><?= $c->height ?></td>
            <td><?= $c->quantity ?></td>
            <td>
                <?php if($c->album == 1){?>Yes<?php }else{?>No<?php } ?>
            </td>
            <td><?= $c->grade ?></td>
            <td><img style="max-height: 50px; max-width:100px;" src="<?= $c->image ?>"></td>
            <td><a href="index.php?page=heat&action=delete&name=<?= $c->name ?>&year=<?= $c->year ?>&width=<?= $c->width ?>&height=<?= $c->height ?>&quantity=<?= $c->quantity ?>&album=<?= $c->album ?>&grade=<?= $c->grade ?>"><i class="fas fa-trash-alt"></i></a></td>
            <td><a href="index.php?page=heat&action=subtract&name=<?= $c->name ?>&year=<?= $c->year ?>&width=<?= $c->width ?>&height=<?= $c->height ?>&quantity=<?= $c->quantity ?>&album=<?= $c->album ?>&grade=<?= $c->grade ?>"><i class="fas fa-minus-circle"></i></a></td>
            <td><a href="index.php?page=heat&action=increment&name=<?= $c->name ?>&year=<?= $c->year ?>&width=<?= $c->width ?>&height=<?= $c->height ?>&quantity=<?= $c->quantity ?>&album=<?= $c->album ?>&grade=<?= $c->grade ?>"><i class="fas fa-plus-circle"></i></a></td>
        </tr>
    <?php } ?>
</table>

<?php include "partials/footer.php"; ?>