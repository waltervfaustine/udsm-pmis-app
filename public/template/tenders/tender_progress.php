<div class="card">
    <div class="card-header bg-primary text-center">
        <h4>Tender Progress</h4>
    </div>
    <div class="card-body">
        <div class="container">
            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="timeline">
                        <div class="timeline__wrap">
                            <div class="timeline__items">
                                <?php $roles = Role::getAll(); ?>
                                <?php foreach($roles as $role): ?>
                                    <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2><?php echo $role->name; ?></h2>
                                            <p><?php echo $role->description; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>