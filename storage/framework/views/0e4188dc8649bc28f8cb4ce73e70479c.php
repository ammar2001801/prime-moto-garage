

<?php $__env->startSection('title','Edit Sparepart'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark">

                    <h4 class="mb-0">

                        <i class="fas fa-edit mr-2"></i>

                        Edit Sparepart

                    </h4>

                </div>

                <div class="card-body">

                    <form action="<?php echo e(route('sparepart.update',$sparepart->id)); ?>" method="POST">

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">

                            <label>Kategori Sparepart</label>

                            <select
                                name="kategori_id"
                                class="form-control"
                                required>

                                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option
                                    value="<?php echo e($item->id); ?>"
                                    <?php echo e($sparepart->kategori_id==$item->id ? 'selected' : ''); ?>>

                                    <?php echo e($item->nama_kategori); ?>


                                </option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Nama Sparepart</label>

                            <input
                                type="text"
                                name="nama_sparepart"
                                class="form-control"
                                value="<?php echo e(old('nama_sparepart',$sparepart->nama_sparepart)); ?>"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Kode Sparepart</label>

                            <input
                                type="text"
                                name="kode_sparepart"
                                class="form-control"
                                value="<?php echo e(old('kode_sparepart',$sparepart->kode_sparepart)); ?>"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Satuan</label>

                            <select
                                name="satuan"
                                class="form-control"
                                required>

                                <option value="PCS" <?php echo e($sparepart->satuan=='PCS' ? 'selected' : ''); ?>>PCS</option>

                                <option value="BOTOL" <?php echo e($sparepart->satuan=='BOTOL' ? 'selected' : ''); ?>>BOTOL</option>

                                <option value="SET" <?php echo e($sparepart->satuan=='SET' ? 'selected' : ''); ?>>SET</option>

                                <option value="UNIT" <?php echo e($sparepart->satuan=='UNIT' ? 'selected' : ''); ?>>UNIT</option>

                                <option value="LITER" <?php echo e($sparepart->satuan=='LITER' ? 'selected' : ''); ?>>LITER</option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Stok</label>

                            <input
                                type="number"
                                name="stok"
                                class="form-control"
                                value="<?php echo e(old('stok',$sparepart->stok)); ?>"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Harga</label>

                            <input
                                type="number"
                                name="harga"
                                class="form-control"
                                value="<?php echo e(old('harga',$sparepart->harga)); ?>"
                                required>

                        </div>

                        <div class="text-right">

                            <a href="<?php echo e(route('sparepart.index')); ?>"
                               class="btn btn-secondary">

                                <i class="fas fa-arrow-left"></i>

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="fas fa-save"></i>

                                Update

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/sparepart/edit.blade.php ENDPATH**/ ?>