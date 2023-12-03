<?=$this->extend('dashboard/partials/layout')?>

<?=$this->section('components')?>
<div class="row justify-content-center">
   
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4><i class="bi bi-pencil-square"></i> Edit a bad</h4>
            </div>
            <div class="card-body">
                
                <form action="<?=base_url('dashboard/edit_bid/'.$bid['id'])?>" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                    <label for="bidTitle" class="form-label">Bid Title</label>
                    <input value="<?=$bid['bidTitle']?>"  type="text" class="form-control" name="bidTitle" id="bidTitle" placeholder="" value="" >
                    <?php if(isset($validation) && $validation->hasError('bidTitle')) : ?>
                       <div class="text-danger"><?=$validation->getError('bidTitle')?></div>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3 ">
                    <label for="file" class="form-label">Bid Detail File (pdf) </label>
                    <input type="file" class="form-control" name="file" id="file" placeholder="" value="" >
                    <?php if(isset($validation) && $validation->hasError('file')) : ?>
                       <div class="text-danger"><?=$validation->getError('file')?></div>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3 ">
                    <label for="logo" class="form-label">Company Logo </label>
                    <input type="file" class="form-control" name="logo" id="logo" placeholder="" value="" >
                    <?php if(isset($validation) && $validation->hasError('logo')) : ?>
                       <div class="text-danger"><?=$validation->getError('logo')?></div>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3">
                    <label for="deadLine" class="form-label">Bid Deadline</label>
                    <input value="<?=$bid['deadLine']?>" type="date" class="form-control" name="deadLine" id="deadLine" placeholder="" value="" >
                    <?php if(isset($validation) && $validation->hasError('deadLine')) : ?>
                       <div class="text-danger"><?=$validation->getError('deadLine')?></div>
                    <?php endif; ?>
                    </div>

                    <div class="col-12 mt-3">
                        <button class="btn btn-primary ">Publish Bid</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3>Bid Dedails</h3>
                <!-- Array ( [id] => 1 [bidTitle] => A bid for the 
                construstion of a 3mv hydro Electricity2 [file_path] => 1697833258_7fdb220200e69e8240b6.pdf 
                [logo_path] => 1697833258_b7c64983ef30a52d77d1.jpg 
                [deadLine] => 2023-10-31 [created_at] => 2023-10-20 13:20:58 ) --> 
                <table class="table table-striped">
                    <tr>
                        <td class="text-upper">Bid Title</td>
                        <td class=""><?=$bid['bidTitle']?></td>
                    </tr>
                    <tr>
                        <td class="text-upper">Posted On</td>
                        <td class=""><?=$bid['created_at']?></td>
                    </tr>
                    <tr>
                        <td class="text-upper">Deadline</td>
                        <td class=""><?=$bid['deadLine']?></td>
                    </tr>
                    <tr>
                        <td class="text-upper">View Details</td>
                        <td class=""><a href="<?=base_url('uploads/'.$bid['file_path'])?>">Click here</a></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?=base_url('uploads/'.$bid['logo_path'])?>" class="img img-fluid rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>