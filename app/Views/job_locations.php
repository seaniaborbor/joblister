
<?=$this->extend('partials/layout')?>

<?php 

function timeAgo($timestamp) {
  $currentTimestamp = time();
  $timestamp = strtotime($timestamp);

  $timeDiff = $currentTimestamp - $timestamp;
  
  $hours = round($timeDiff / 3600);
  $days = round($timeDiff / 86400);
  $weeks = round($timeDiff / 604800);
  $months = round($timeDiff / 18748800);

  if ($months >= 1) {
      return $months . " months ago";
  } elseif ($weeks >= 1) {
      return $weeks . " weeks ago";
  } elseif ($days >= 1) {
      return $days . " days ago";
  } else {
      return $hours . " hours ago";
  }
}

?>


<?=$this->section('main')?>

<div class="row">
    
    <div class="col-md-8">
      <!-- main article with job listings -->
              
        <div class="d-flex align-items-center px-3 my-3 py-2 text-white bg-purple rounded shadow-sm">
          <h1 class=" my-0 mb-0  me-3"><i class="bi bi-briefcase-fill"></i></h1>
          <div class="lh-1">
            <h1 class="h6 mb-0 text-white lh-1"><?=count($location_jobs)?> Total </h1>
            <small>Jobs <?=$loc?> </small>
          </div>
        </div>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <h6 class="border-bottom pb-2 mb-0">Hot Jobs On The List</h6>
          <?php if(isset($location_jobs)) : ?>
            <?php foreach($location_jobs as $jb) : ?>
              <div class="d-flex text-muted pt-3">
                <img src="<?=base_url('uploads/'.$jb['logo_path'])?>" class="me-2 shadow-sm" width="32" height="32" alt="">
              <p class="pb-3 mb-0 small lh-sm border-bottom">
                <a class="text-gray-dark" href="<?=base_url('uploads/'.$jb['file_path'])?>"><strong class="d-block "><?=$jb['title']?></strong></a>
                <span class="text-dark"><i class="bi  bi-hourglass-bottom"></i> Posted about:</span> <?=timeAgo($jb['createdAt'])?> <span class="text-dark"> <i class="bi bi-geo-alt"></i> Location:</span> <?=$jb['location']?>| <i class="bi  bi-calendar-check"></i> Application Deadline:</span> <?=$jb['deadline']?>
              </p>
            </div>
            <?php endforeach; ?>
          <?php endif; ?>
          
        </div>
      <!-- end of article-->
    </div>

    <div class="col-md-4 mt-3">
      <div class="card">
        <div class="card-body">
          <img src="https://www.exclusivetravel.co/images/your-advert-here-animated.gif" alt="" class="img-fluid w-100">
        </div>
      </div>
    </div>
</div>

<?=$this->endSection()?>