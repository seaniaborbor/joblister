<?=$this->extend('dashboard/partials/layout')?>

<?=$this->section('components')?>
<div class="row">
    <div class="col-md-8">
    <div class="card shadow-sm">
            <div class="card-header"><h3><i class="bi text-secondary bi-table"></i> Bids Log</h3></div>
            <div class="card-body">
                <table id="example" class="mt-5 table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>BID TITLE</th>
                    <th>CREATED AT</th>
                    <th>DEADLINE</th>
                    <th>MORE</th>
                    </tr>
                </thead>
                <tbody class="pb-3">
                    <?php if(isset($bids)) : ?>
                      <?php foreach($bids as $bid) :?>
                        <?php if(session()->get('loginEmail') == $bid['lastEditedBy'] || session()->get('accountType') == 1) :?>
                        <tr class="pt-3">
                            <td><?=$bid['bidTitle']?></td>
                            <td><?=$bid['created_at']?></td>
                            <td><?=$bid['deadLine']?></td>
                            <td>
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-wrench-adjustable"></i> Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?=base_url('uploads/'.$bid['file_path'])?>"><i class="bi bi-eye-fill"></i> View</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url('dashboard/edit_bid/'.$bid['id'])?>"><i class="bi bi-pencil-square"></i> Edit Bid</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?=base_url('dashboard/delete_bid/'.$bid['id'])?>"><i class="bi text-danger bi-trash-fill"></i> Delete</a></li>
                                </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4><i class="bi text-secondary bi-pencil-square"></i> Post A Bid</h4>
            </div>
            <div class="card-body">
                
                <form action="<?=base_url('dashboard/create_bid')?>" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                    <label for="bidTitle" class="form-label">Bid Title</label>
                    <input type="text" class="form-control" name="bidTitle" id="bidTitle" placeholder="" value="" >
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
                    <input type="date" class="form-control" name="deadLine" id="deadLine" placeholder="" value="" >
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
</div>
<?=$this->endSection()?>