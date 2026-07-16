<div id="sidebar"
     class="text-white position-fixed d-flex flex-column"
     style="background:#0F172A; width:250px; height:100vh; overflow-y:auto; left:0; top:0; z-index:1030;">
    <!-- Logo -->
<div class="text-center py-4 border-bottom">

    <i class="fas fa-motorcycle fa-3x mb-3"></i>

    <h3 class="fw-bold mb-0">
        PRIME
    </h3>

    <h6 class="mb-2">
        MOTO GARAGE
    </h6>

    <small style="font-size:11px; letter-spacing:1px;">
        Professional Motorcycle Service
    </small>

</div>

    <!-- User -->
    <div class="text-center py-3 border-bottom">

        <i class="fas fa-user-circle fa-4x mb-2"></i>

        <h5 class="mb-0">

            <?php echo e(Auth::user()->name); ?>


        </h5>

        <small>

            Administrator

        </small>

    </div>

    <!-- Menu -->
    <div class="flex-grow-1">

        <a href="<?php echo e(route('dashboard')); ?>"
           class="sidebar-menu <?php echo e(Request::routeIs('dashboard') ? 'active' : ''); ?>">
            <i class="fas fa-home"></i>
            Dashboard
        </a>

        <a href="<?php echo e(route('pelanggan.index')); ?>"
           class="sidebar-menu <?php echo e(Request::routeIs('pelanggan.*') ? 'active' : ''); ?>">
            <i class="fas fa-users"></i>
            Pelanggan
        </a>

        <a href="<?php echo e(route('kendaraan.index')); ?>"
           class="sidebar-menu <?php echo e(Request::routeIs('kendaraan.*') ? 'active' : ''); ?>">
            <i class="fas fa-motorcycle"></i>
            Kendaraan
        </a>

        <a href="<?php echo e(route('mekanik.index')); ?>"
           class="sidebar-menu <?php echo e(Request::routeIs('mekanik.*') ? 'active' : ''); ?>">
            <i class="fas fa-user-cog"></i>
            Mekanik
        </a>

        <a href="<?php echo e(route('kategori-sparepart.index')); ?>"
           class="sidebar-menu <?php echo e(Request::routeIs('kategori-sparepart.*') ? 'active' : ''); ?>">
            <i class="fas fa-tags"></i>
            Kategori Sparepart
        </a>

        <a href="<?php echo e(route('sparepart.index')); ?>"
           class="sidebar-menu <?php echo e(Request::routeIs('sparepart.*') ? 'active' : ''); ?>">
            <i class="fas fa-cogs"></i>
            Sparepart
        </a>

        <a href="<?php echo e(route('servis.index')); ?>"
           class="sidebar-menu <?php echo e(Request::routeIs('servis.*') ? 'active' : ''); ?>">
            <i class="fas fa-tools"></i>
            Servis
        </a>

        <a href="<?php echo e(route('pembayaran.index')); ?>"
            class="sidebar-menu <?php echo e(Request::routeIs('pembayaran.*') ? 'active' : ''); ?>">
            <i class="fas fa-money-bill-wave"></i>
            Pembayaran
        </a>

        <a href="<?php echo e(route('laporan.index')); ?>"
            class="sidebar-menu <?php echo e(Request::routeIs('laporan.*') ? 'active' : ''); ?>">
            <i class="fas fa-chart-bar"></i>
            Laporan
        </a>

    </div>

    <!-- Logout -->
    <div class="p-3 border-top">

        <form method="POST" action="<?php echo e(route('logout')); ?>">

            <?php echo csrf_field(); ?>

            <button class="btn btn-danger w-100">

                <i class="fas fa-sign-out-alt"></i>

                Logout

            </button>

        </form>

    </div>

</div><?php /**PATH C:\laragon\www\bengkel-app\resources\views/components/sidebar.blade.php ENDPATH**/ ?>