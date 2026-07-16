

<?php $__env->startSection('title', 'Data Sparepart'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="font-weight-bold">
                <i class="fas fa-cogs text-primary"></i>
                Data Sparepart
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh data sparepart bengkel
            </p>

        </div>

        <a href="<?php echo e(route('sparepart.create')); ?>" class="btn btn-primary shadow">

            <i class="fas fa-plus-circle"></i>

            Tambah Sparepart

        </a>

    </div>

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form action="<?php echo e(route('sparepart.index')); ?>" method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama atau kode sparepart..."
                            value="<?php echo e(request('search')); ?>">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary btn-block">

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

                Daftar Sparepart

            </h5>

        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">

                <thead class="bg-primary text-white">

                    <tr>

                        <th width="60">No</th>
                        <th>Kategori</th>
                        <th>Nama Sparepart</th>
                        <th>Kode</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th width="150">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $spareparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($loop->iteration); ?></td>

                        <td><?php echo e($item->kategori->nama_kategori); ?></td>

                        <td><?php echo e($item->nama_sparepart); ?></td>

                        <td><?php echo e($item->kode_sparepart); ?></td>

                        <td><?php echo e($item->satuan); ?></td>

                        <td><?php echo e($item->stok); ?></td>

                        <td>Rp <?php echo e(number_format($item->harga,0,',','.')); ?></td>

                        <td>

                            <a href="<?php echo e(route('sparepart.edit',$item->id)); ?>"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form
                                action="<?php echo e(route('sparepart.destroy',$item->id)); ?>"
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

                        <td colspan="8" class="text-center">

                            Belum ada data sparepart.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            <?php echo e($spareparts->links()); ?>


        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/sparepart/index.blade.php ENDPATH**/ ?>