<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col-12">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="fw-bold">

                        <i class="fas fa-tachometer-alt text-primary"></i>

                        Dashboard

                    </h2>

                    <p class="text-muted">

                        Selamat Datang di Sistem Informasi Prime Moto Garage

                    </p>

                </div>

                <div>

                    <span class="badge bg-primary p-3">

                        <?php echo e(date('d F Y')); ?>


                    </span>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <!-- Pelanggan -->

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-primary shadow dashboard-card">

                <div class="inner">

                    <h3>

                        <?php echo e($pelanggan); ?>


                    </h3>

                    <p>

                        Pelanggan

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-users"></i>

                </div>

            </div>

        </div>

        <!-- Kendaraan -->

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-success shadow dashboard-card">

                <div class="inner">

                    <h3>

                        <?php echo e($kendaraan); ?>


                    </h3>

                    <p>

                        Kendaraan

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-motorcycle"></i>

                </div>

            </div>

        </div>

        <!-- Mekanik -->

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-warning shadow dashboard-card">

                <div class="inner">

                    <h3>

                        <?php echo e($mekanik); ?>


                    </h3>

                    <p>

                        Mekanik

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-user-cog"></i>

                </div>

            </div>

        </div>

        <!-- Sparepart -->

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-info shadow dashboard-card">

                <div class="inner">

                    <h3>

                        <?php echo e($sparepart); ?>


                    </h3>

                    <p>

                        Sparepart

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-cogs"></i>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-danger shadow dashboard-card">

                <div class="inner">

                    <h3>

                        <?php echo e($servis); ?>


                    </h3>

                    <p>

                        Servis

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-wrench"></i>

                </div>

            </div>

        </div>

        <!-- Pembayaran -->

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-secondary shadow dashboard-card">

                <div class="inner">

                    <h3>

                        <?php echo e($pembayaran); ?>


                    </h3>

                    <p>

                        Pembayaran

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-money-bill-wave"></i>

                </div>

            </div>

        </div>

        <!-- Pendapatan -->

        <div class="col-lg-6 col-md-12 mb-4">

            <div class="small-box bg-gold shadow dashboard-card">

                <div class="inner">

                    <h3>

                        Rp <?php echo e(number_format($pendapatan,0,',','.')); ?>


                    </h3>

                    <p>

                        Total Pendapatan

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-coins"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">

                        <i class="fas fa-info-circle"></i>

                        Informasi Dashboard

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row text-center">

                        <div class="col-md-3">

                            <h4 class="text-primary">

                                <?php echo e($pelanggan); ?>


                            </h4>

                            <small>Total Pelanggan</small>

                        </div>

                        <div class="col-md-3">

                            <h4 class="text-success">

                                <?php echo e($kendaraan); ?>


                            </h4>

                            <small>Total Kendaraan</small>

                        </div>

                        <div class="col-md-3">

                            <h4 class="text-warning">

                                <?php echo e($servis); ?>


                            </h4>

                            <small>Total Servis</small>

                        </div>

                        <div class="col-md-3">

                            <h4 class="text-danger">

                                Rp <?php echo e(number_format($pendapatan,0,',','.')); ?>


                            </h4>

                            <small>Total Pendapatan</small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <style>

.dashboard-card{

    border-radius:15px;

    overflow:hidden;

    transition:all .3s ease;

}

.dashboard-card:hover{

    transform:translateY(-6px);

    box-shadow:0 15px 30px rgba(0,0,0,.25);

}

.dashboard-card .inner{

    padding:20px;

}

.dashboard-card h3{

    font-size:30px;

    font-weight:bold;

}

.dashboard-card p{

    font-size:16px;

    margin-bottom:0;

}

.dashboard-card .icon{

    top:10px;

    right:15px;

    font-size:65px;

    opacity:.18;

    transition:.3s;

}

.dashboard-card:hover .icon{

    transform:scale(1.15);

    opacity:.28;

}

.bg-gold{

    background:linear-gradient(135deg,#FFD54F,#FF9800)!important;

    color:#fff!important;

}

.bg-gold h3,

.bg-gold p{

    color:#fff!important;

}

.bg-gold .icon{

    color:rgba(255,255,255,.30)!important;

}

.card{

    border:none;

    border-radius:15px;

}

.card-header{

    border-top-left-radius:15px!important;

    border-top-right-radius:15px!important;

}

.badge{

    font-size:14px;

    border-radius:10px;

}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/dashboard.blade.php ENDPATH**/ ?>