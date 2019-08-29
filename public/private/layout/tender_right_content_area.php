<div class="col-md-7">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
        <h2 class="panel-title">Update and Delete Tender Categories</h2>
    </div>
        <?php  $tenderCategories = TenderCategory::getAll(); ?>
        
        <div class="panel-body" id="tender_category_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="tender_category_edit_button">
                    <div class="well">
                        <form action="create/" method="post">
                            <div class="form-group">
                                <label for="collapse_tender_category_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_tender_category_title" name="tender_category_title" placeholder="Tender Title">
                            </div>

                            <div class="form-group">
                                <label for="collapse_tender_category_body" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_tender_category_body" name="tender_category_body" rows="3" placeholder="Description..."></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="collapse_tender_category_id" name="tender_category_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" type="submit" name="add_tender_category">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info"><span class="glyphicon glyphicon-expand"></span></th>
                        <th class="info">Tender Title</th>
                        <th class="info">Description</th>
                        <th class="info"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tenderCategories as $tenderCategory): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderCategory->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderCategory->title); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderCategory->body); ?></td>
                            <td class="">
                                <button type="button" class="btn btn-info btn-xs tender-category-edit-btn" data-toggle="collapse" data-target="#tender_category_edit_button" aria-expanded="false" aria-controls="tender_category_edit_button">
                                    Edit Info
                                </button>
                            </td>
                            <td class=""><a href="delete/index.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderCategory->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <nav aria-label="...">
                    <ul class="pager">
                        <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
                        <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
                    </ul>
            </nav>
        </div>
    </div>
</div>