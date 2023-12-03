<?=$this->extend('dashboard/partials/layout')?>

<?=$this->section('components')?>
<div class="row justify-content-center">

    <div class="col-md-5">
        <div class="card bg-light shadow-sm">
            <div class="card-header">
                <h4><i class="bi bi-pencil-square"></i> Post Job Vacancy</h4>
            </div>
            <div class="card-body">
                
               <form method="post" action="<?=base_url('dashboard/edit_job/'.$job['id'])?>" enctype="multipart/form-data">
                <div class="col-12">
                    <label for="jobTitle" class="form-label">Job/Vacancy Title</label>
                    <input type="text" value="<?=$job['title']?>" class="form-control" name="jobTitle" id="jobTitle" placeholder="" value="" >
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
                    <input type="text" value="<?=$job['location']?>" class="form-control" name="location" id="location" placeholder="" value="" >
                    <?php if (isset($validation)): ?>
                        <?php if ($validation->hasError('location')): ?>
                            <div class="text-danger"><?= esc($validation->getError('location')) ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3">
                    <label for="deadLine" class="form-label">Application Deadline</label>
                    <input type="date" value="<?=$job['deadline']?>" class="form-control" name="deadLine" id="deadLine" placeholder="" value="" >
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
        
    <div class="col-md-4">
        <div class="card  border">
            <div class="card-body">
                <h3>Job Vacancy Info</h3>
                <table class="table table-striped">
                    <tr>
                        <td>Job Title :</td>
                        <td><?=$job['title']?></td>
                    </tr>
                    <tr>
                        <td>Posted On:</td>
                        <td><?=$job['createdAt']?></td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td><?=$job['deadline']?></td>
                    </tr>
                    <tr>
                        <td>County of Job</td>
                        <td><?=$job['location']?></td>
                    </tr>
                    <tr>
                        <td>Deatils of Job</td>
                        <td><a href="<?=base_url('uploads/'.$job['file_path'])?>">Click Here</a></td>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-md-6">
                        <img src="<?=base_url('uploads/'.$job['logo_path'])?>" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?=$this->endSection()?>