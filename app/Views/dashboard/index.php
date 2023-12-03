<?=$this->extend('dashboard/partials/layout')?>

<?=$this->section('components')?>
    <?php 
        include("partials/summary.php");
    ?>

    <div class="container-fluid mt-4">
        <div class="row">

            <div class="col-md-8">
                <div class="card-header"><h4>Job Vs Bids</h4></div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div class="card">
                <div class="card-body">
                        <canvas id="barChart"></canvas>
                            <script>
                                // Data for the bar chart
                                    const barChartData = {
                                        labels: ["Total Jobs", "Total Expire Jobs", "Total Open Jobs", "Total Bids", "total expire Bids", "Total Open Bids"],
                                        datasets: [
                                            {
                                                label: "Sample Data",
                                                backgroundColor: "rgba(75, 192, 192, 0.2)",
                                                borderColor: "rgba(75, 192, 192, 1)",
                                                borderWidth: 1,
                                                data: [<?=$total_jobs?>, <?=$total_expire_jobs?>, <?=$total_jobs-$total_expire_jobs?>, <?=$total_bids?>, <?=$total_expire_bids?>,<?=$total_bids-$total_expire_bids?>],
                                            },
                                        ],
                                    };

                                    // Get the canvas element
                                    const ctx = document.getElementById("barChart").getContext("2d");

                                    // Create the bar chart
                                    const myBarChart = new Chart(ctx, {
                                        type: "line",
                                        data: barChartData,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                },
                                            },
                                        },
                                    });

                            </script>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Post Summary</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Account</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card m-3 border shadow-sm rounded rounded-5 m-2">
                                    <div class="alert alert-warning  card-header"><h5>Tabular Posts Sumarry </h5></div>
                                    <table class="table lead table-striped table-border">
                                    <tr >
                                            <td></td>
                                            <td class="text-primary fw-bold" >Total</td>
                                            <td class="text-primary fw-bold" >Expire</td>
                                            <td class="text-primary fw-bold" >Open</td>
                                        </tr>
                                        <tr >
                                            <td class="text-primary fw-bold" >Jobs Posted</td>
                                            <td class="text-dark fw-bold" ><?=$total_jobs?></td>
                                            <td class="text-danger fw-bold"><?=$total_expire_jobs?></td>
                                            <td class="text-success fw-bold"><?=$total_jobs-$total_expire_jobs?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-primary fw-bold" >Bids Posted</td>
                                            <td class="text-dark fw-bold" ><?=$total_bids?></td>
                                            <td class="text-danger fw-bold"><?=$total_expire_bids?></td>
                                            <td class="text-success fw-bold"><?=$total_bids-$total_expire_bids?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                   <div class="card   shadow-sm border m-2">
                                    <div class="card-header "><h5>Accounts Summary</h5></div>
                                    <div class="card-body p-0">
                                    <table class="table table-hover table-striped table-border ">
                                    <tr >
                                            <td class="text-primary lead">Administrative Accounts</td>
                                            <td class="text-primary lead">User Accounts</td>
                                        </tr>
                                        <tr >
                                            <td class="text-success lead text-center fw-bold"><?=$admin_users?></td>
                                            <td class="text-success lead text-center fw-bold"><?=$user_users?></td>
                                        </tr>
                                    </table>
                                    </div>
                                   </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?=$this->endSection()?>