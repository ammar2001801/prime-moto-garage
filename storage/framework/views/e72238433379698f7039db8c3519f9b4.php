

<?php $__env->startSection('title', 'Data Pelanggan'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-0">
                <i class="fas fa-users text-primary"></i>
                Data Pelanggan
            </h2>

            <small class="text-muted">
                Kelola seluruh data pelanggan bengkel
            </small>
        </div>

        <a href="<?php echo e(route('pelanggan.create')); ?>" class="btn btn-primary">

            <i class="fas fa-plus-circle"></i>

            Tambah Pelanggan

        </a>

    </div>

    
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form method="GET" action="<?php echo e(route('pelanggan.index')); ?>">

                <div class="row">

                    <div class="col-md-10">

                        <input
                            type="text"
                            name="search"
                            value="<?php echo e(request('search')); ?>"
                            class="form-control"
                            placeholder="Cari nama atau email pelanggan...">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            <i class="fas fa-search"></i>

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    
    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                Daftar Pelanggan

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">No</th>

                            <th>Nama</th>

                            <th>Email</th>

                            <th>No HP</th>

                            <th>NIK</th>

                            <th>Alamat</th>

                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $pelanggans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <td>

                                <?php echo e($loop->iteration); ?>


                            </td>

                            <td>

                                <?php echo e($pelanggan->user->name); ?>


                            </td>

                            <td>

                                <?php echo e($pelanggan->user->email); ?>


                            </td>

                            <td>

                                <?php echo e($pelanggan->no_hp); ?>


                            </td>

                            <td>

                                <?php echo e($pelanggan->nik); ?>


                            </td>

                            <td>

                                <?php echo e($pelanggan->alamat); ?>


                            </td>

                            <td>

                                <a href="<?php echo e(route('pelanggan.edit',$pelanggan->id)); ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form
                                    action="<?php echo e(route('pelanggan.destroy',$pelanggan->id)); ?>"
                                    method="POST"
                                    class="d-inline form-delete">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="7" class="text-center text-muted">

                                Belum ada data pelanggan.

                            </td>

                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <?php echo e($pelanggans->links()); ?>


            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/pelanggan/index.blade.php ENDPATH**/ ?>