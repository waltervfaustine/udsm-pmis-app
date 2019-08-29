<div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Publish, Update and Delete Document</h2>
    </div>
        <?php  $userRequirements = UserRequirement::getAll(); ?>
        
        <div class="panel-body" id="user_requirement_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="user_requirement_edit_btn">
                    <div class="well">
                        <form action="create/" method="post">
                            <div class="form-group">
                                <label for="collapse_user_requirement_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_user_requirement_title" name="requirement_title" placeholder="Requirement Title">
                            </div>

                            <div class="form-group">
                                <label for="collapse_user_requirement_body" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_user_requirement_body" name="requirement_body" rows="3" placeholder="Requirement Description"></textarea>
                            </div>

                            <input type="hidden" id="collapse_user_requirement_filename" name="user_requirement_filename">
                            <input type="hidden" id="collapse_user_requirement_type" name="user_requirement_type">
                            <input type="hidden" id="collapse_user_requirement_size" name="user_requirement_size">


                            <div class="input-group">
                                <label for="requirement_docfile" class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Browse&hellip; <input id="requirement_docfile" type="file" name="requirement_docfile" style="display: none;" multiple>
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="collapse_user_requirement_id" name="requirement_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" type="submit" name="add_user_requirement">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info"><span class="glyphicon glyphicon-expand"></span></th>
                        <th class="info">Title</th>
                        <th class="info">Description</th>
                        <th class="info">Filename</th>
                        <th class="info"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($userRequirements as $userRequirement): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->title); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->body); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->filename); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->type); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->size); ?></td>
                            <td class="">
                                <button type="button" class="btn btn-info btn-xs user-requirement-edit-btn" data-toggle="collapse" data-target="#user_requirement_edit_btn" aria-expanded="false" aria-controls="user_requirement_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class=""><a href="delete/index.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
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
