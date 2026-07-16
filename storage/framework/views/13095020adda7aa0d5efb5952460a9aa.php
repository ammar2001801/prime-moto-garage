

<?php $__env->startSection('title', 'Data Kendaraan'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>
            <i class="fas fa-car text-primary"></i>
            Data Kendaraan
        </h3>

        <a href="<?php echo e(route('kendaraan.create')); ?>" class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Tambah Kendaraan

        </a>

    </div>

    <?php if(session('success')): ?>

        <div class="alert alert-success">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>

    <div class="card shadow">

        <div class="card-header">

            <div class="row">

                <div class="col-md-4">

                    <form action="<?php echo e(route('kendaraan.index')); ?>" method="GET">

                        <div class="input-group">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari Plat / Merk..."
                                value="<?php echo e(request('search')); ?>">

                            <button class="btn btn-primary">

                                <i class="fas fa-search"></i>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Plat Nomor</th>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Warna</th>
                            <th>Tahun</th>
                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $kendaraans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <td><?php echo e($loop->iteration); ?></td>

                            <td><?php echo e($item->pelanggan->user->name); ?></td>

                            <td><?php echo e($item->plat_nomor); ?></td>

                            <td><?php echo e($item->merk); ?></td>

                            <td><?php echo e($item->tipe); ?></td>

                            <td><?php echo e($item->warna); ?></td>

                            <td><?php echo e($item->tahun); ?></td>

                            <td>

                                <a href="<?php echo e(route('kendaraan.edit',$item->id)); ?>"
                                    class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form
                                    action="<?php echo e(route('kendaraan.destroy',$item->id)); ?>"
                                    method="POST"
                                    class="d-inline">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="8" class="text-center">

                                Belum ada data kendaraan.

                            </td>

                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <?php echo e($kendaraans->links()); ?>


            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/kendaraan/index.blade.php ENDPATH**/ ?>