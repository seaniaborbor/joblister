<?=$this->extend('dashboard/partials/layout')?>

<?=$this->section('components')?>
<div class="row">

    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h3><i class="bi text-secondary bi-table"></i> Job/Vacancy Log</h3></div>
            <div class="card-body">
            <table id="example" class="mt-5 table-hover table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>BID TITLE</th>
                        <th>CREATED AT</th>
                        <th>CREATED AT</th>
                        <th>DEADLINE</th>
                        <th>MORE</th>
                    </tr>
                </thead>
                <tbody class="pb-3">
                    <?php if(isset($jobs)) : ?>
                      <?php foreach($jobs as $job) :?>
                        <?php if(session()->get('loginEmail') == $job['lastEditedBy'] || session()->get('accountType') == 1) :?>
                        <tr class="pt-3">
                            <td><?=$job['title']?></td>
                            <td><?=$job['location']?></td>
                            <td><?=$job['createdAt']?></td>
                            <td><?=$job['deadline']?></td>
                            <td>
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-wrench-adjustable"></i> Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?=base_url('uploads/'.$job['file_path'])?>"><i class="bi bi-eye-fill"></i> View</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url('dashboard/edit_job/'.$job['id'])?>"><i class="bi bi-pencil-square"></i> Edit Job</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?=base_url('dashboard/delete_job/'.$job['id'])?>"><i class="bi text-danger bi-trash"></i> Delete</a></li>
                                </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endif ?>                    
                      <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-light shadow-sm">
            <div class="card-header">
                <h4><i class=" text-secondary bi bi-pencil-square"></i> Post Job Vacancy</h4>
            </div>
            <div class="card-body">
                
               <form method="post" action="<?=base_url('dashboard/create_job')?>" enctype="multipart/form-data">
                <div class="col-12">
                    <label for="jobTitle" class="form-label">Job/Vacancy Title</label>
                    <input type="text" class="form-control" name="jobTitle" id="jobTitle" placeholder="" value="" >
                    <?php if (isset($validation)): ?>
                        <?php if ($validation->hasError('jobTitle')): ?>
                            <div class="text-danger"><?= esc($validation->getError('jobTitle')) ?></div>
                        <?php endif; ?>
                    <?php endif; ?>

                    </div>
                    
                    <div class="col-12 mt-3 ">
                    <label for="file" class="form-label">Application Detail File (pdf) </label>
                    <input type="file" class="form-control" name="file" id="file" placeholder="" value="" >
                    <?php if (isset($validation)): ?>
                        <?php if ($validation->hasError('file')): ?>
                            <div class="text-danger"><?= esc($validation->getError('file')) ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3 ">
                    <label for="logo" class="form-label">Company Logo </label>
                    <input type="file" class="form-control" name="logo" id="logo" placeholder="" value="" >
                    <?php if (isset($validation)): ?>
                        <?php if ($validation->hasError('logo')): ?>
                            <div class="text-danger"><?= esc($validation->getError('logo')) ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3 ">
                    <label for="location" class="form-label">County of Vacancy </label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="" value="" >
                    <?php if (isset($validation)): ?>
                        <?php if ($validation->hasError('location')): ?>
                            <div class="text-danger"><?= esc($validation->getError('location')) ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3">
                    <label for="deadLine" class="form-label">Application Deadline</label>
                    <input type="date" class="form-control" name="deadLine" id="deadLine" placeholder="" value="" >
                    <?php if (isset($validation)): ?>
                        <?php if ($validation->hasError('deadLine')): ?>
                            <div class="text-danger"><?= esc($validation->getError('deadLine')) ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3">
                        <button class="btn btn-primary  shadow-lg">Publish Vacancy</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>





<?=$this->endSection()?>