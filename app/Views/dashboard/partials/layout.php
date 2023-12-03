<?php 




function highlight($title, $link)
{
  if($title == $link)
  {
    echo "active";
  }
}


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title><?=$title?></title>

  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   

    

    <!-- Bootstrap core CSS -->
<link href="<?=base_url('assets/dist/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
  <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      .nav-link{
        font-size:17px;
      }

      .bg-purple, .active{
        background-color: #6f42c1 !important;
        
      }

      .active  a{
        color: white !important;
      }

      tr, td{
        border: none !important;
      }

      #home-tab , #profile-tab
      {
        background-color: #FFFFFF !important;
      }

      
      

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .tab-content .active {
        background:white !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/dist/css/dashboard.css')?>" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-purple flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-2" href="#">JustTheJob</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input disabled class="form-control form-control-dark w-100" type="text"  aria-label="Search">
  <div class="navbar-nav p-0">
    <div class="nav-item p-0 text-nowrap ">
      <a class="nav-link px-3" href="<?=base_url('dashboard/profile')?>"><i class="bi bi-users"> </i>Profile</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky ">
        <ul class="nav flex-column text-uppercase">
          <li class="nav-item <?php highlight($title, 'dashboard'); ?>">
            <a class="nav-link  " aria-current="page" href="<?=base_url('dashboard')?>">
               Dashboard
            </a>
          </li>
          <li class="nav-item <?php highlight($title, 'create_job'); ?>">
            <a class="nav-link " href="<?=base_url('dashboard/create_job')?>">
              
              <i class="bi bi-suitcase-lg"></i> Post Job
            </a>
          </li>
          <li class="nav-item <?php highlight($title, 'create_bid'); ?>">
            <a class="nav-link " href="<?=base_url('dashboard/create_bid')?>">
            
              <i class="bi bi-paperclip"></i> Post a Bid
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="<?=base_url()?>" type="button" class="btn btn-sm btn-primary"><i class="bi bi-browser-chrome"></i>Website </a>
            <a href="<?=base_url('logout')?>" type="button" class="btn btn-sm btn-danger"> <i class="bi bi-person-vcard-fill"> </i>Sign Out</a>
          </div>
        </div>
      </div>

        <!-- this where all the components of the dashboard will be displayed -->
        <?=$this->renderSection('components')?>
        
    </main>
  </div>
</div>







<script src="<?=base_url('assets/dist/js/bootstrap.bundle.min.js')?>"></script>


    <?php if (session()->getFlashdata('success')) : ?>
    <!-- Button to Open the Modal -->
      <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body py-5 text-center">
                    <h2 class="display-1 text-success"><i class="bi bi-check2-circle"></i></h2>
                    <h3 class="text-success"><?= session()->getFlashdata('success') ?></h3>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
        <script>
            const myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        </script>

<?php endif; ?>

<?php if (isset($validation) || session()->getFlashdata('error')) : ?>
    <!-- Button to Open the Modal -->
      <!-- The Modal -->
        <div class="modal fade" id="error">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body py-5 text-center">
                    <h2 class="display-1 text-danger"><i class="bi bi-exclamation-diamond"></i></h2>
                    <h3 class="text-danger">
                      <?php 
                        if(session()->getFlashdata('error')){
                          echo session()->getFlashdata('error');
                        }else{
                          echo "You've Got Some Error.<br> Fix them and proceed";
                        }
                       ?>
                       </h3>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
        <script>
            const error = new bootstrap.Modal(document.getElementById('error'));
            error.show();
        </script>

<?php endif; ?>





<!-- Add DataTables JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
      $('.dataTables_filter').addClass('mb-3');
    });
  </script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  
</body>
</html>
