

<?php $__env->startSection('title','Data Pembayaran'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h3>
            <i class="fas fa-money-bill-wave"></i>
            Data Pembayaran
        </h3>

        <a href="<?php echo e(route('pembayaran.create')); ?>"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Pembayaran

        </a>

    </div>


    <div class="card shadow">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari Kode Servis..."
                               value="<?php echo e(request('search')); ?>">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <br>


    <div class="card shadow">

        <div class="card-header bg-success text-white">

            Data Pembayaran

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Kode Servis</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th width="220">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($loop->iteration); ?></td>

                        <td>

                            <?php echo e($item->servis->kode_servis ?? '-'); ?>


                        </td>

                        <td>

                            <?php echo e($item->servis->kendaraan->pelanggan->user->name ?? '-'); ?>


                        </td>

                        <td>

                            Rp <?php echo e(number_format($item->total_tagihan,0,',','.')); ?>


                        </td>

                        <td>

                            <?php echo e($item->tanggal_bayar); ?>


                        </td>

                        <td>

                            <?php echo e($item->metode_bayar); ?>


                        </td>

                        <td>

                            <?php if($item->status=="Lunas"): ?>

                                <span class="badge bg-success">

                                    <?php echo e($item->status); ?>


                                </span>

                            <?php else: ?>

                                <span class="badge bg-warning text-dark">

                                    <?php echo e($item->status); ?>


                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            
                            <a href="<?php echo e(route('pembayaran.show',$item->id)); ?>"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>


                            
                            <a href="<?php echo e(route('pembayaran.edit',$item->id)); ?>"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>


                            
                            <form action="<?php echo e(route('pembayaran.destroy',$item->id)); ?>"
                                  method="POST"
                                  class="d-inline form-delete">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            Belum ada pembayaran.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

            <?php echo e($pembayarans->links()); ?>


        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/pembayaran/index.blade.php ENDPATH**/ ?>