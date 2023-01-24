<?php
  session_start();
  include('includes/lib.php');
  $pageTitle = "About Us";

  ?>

<?php include('template/header.php'); ?>





<?php include('template/startNavbar.php'); ?>

<!-- محتوى الصفحة -->
<main class="page">
    <header class="py-10 mb-0 ">
        <div class="container-xl px-4 text-center">
            <div class="row">
                <div class="col-12">
                    <div class="text-center ">
                        <h1 class="text-primary">About Us</h1>
                        <p class="m-auto mb-0 mt-0 col-lg-5">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.Nuncquam urna,dignissim
                            nec auctor in, mattis vitae leo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4">
        <div class="row">
            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="card">
                    <div class="card-body text-center pt-5 pb-5">
                        <h3 class="mb-4">Office locations</h3>
                        <p class="mb-4">To best support our growing global customer base, we have both remote and
                            in-person office locations around the world.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="card">
                    <div class="card-body text-center pt-5 pb-5">
                        <h3 class="mb-4">FEATURED</h3>
                        <p class="mb-4">all thing to Event Management all thing to Event Management all thing to Event
                            Management.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="card">
                    <div class="card-body text-center pt-5 pb-5">
                        <h3 class="mb-4">Team Access</h3>
                        <p class="mb-4">Upgrade your plan to get access to team collaboration tools.</p>
                    </div>
                </div>
            </div>



        </div>
    </div>
</main>


<?php include('template/footer.php') ?>