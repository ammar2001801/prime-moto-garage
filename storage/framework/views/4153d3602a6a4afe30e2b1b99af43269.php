<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3">

    <div class="container-fluid">

        <div>

            <h4 class="mb-0 fw-bold">

                <?php echo $__env->yieldContent('title'); ?>

            </h4>

            <small class="text-muted">

                Selamat Datang di Sistem Informasi Prime Moto Garage

            </small>

        </div>

        <div class="d-flex align-items-center">

            <div class="text-end me-3">

                <strong>

                    <?php echo e(Auth::user()->name); ?>


                </strong>

                <br>

                <small class="text-muted">

                    Administrator

                </small>

            </div>

            <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center"
                 style="width:45px;height:45px;">

                <i class="fas fa-user"></i>

            </div>

        </div>

    </div>

</nav><?php /**PATH C:\laragon\www\bengkel-app\resources\views/components/navbar.blade.php ENDPATH**/ ?>