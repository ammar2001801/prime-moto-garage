

<?php $__env->startSection('title','Detail Servis'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">


    <div class="d-flex justify-content-between mb-3">


        <h3>

            <i class="fas fa-tools"></i>

            Detail Servis

        </h3>



        <div>


            <a href="<?php echo e(route('detail-servis.create',['servis'=>$servis->id])); ?>"
               class="btn btn-info">


                <i class="fas fa-plus"></i>

                Tambah Jasa


            </a>



            <a href="<?php echo e(route('detail-sparepart.create',['servis'=>$servis->id])); ?>"
               class="btn btn-success">


                <i class="fas fa-cogs"></i>

                Tambah Sparepart


            </a>


        </div>


    </div>




    <div class="card shadow mb-3">


        <div class="card-header bg-primary text-white">

            Informasi Servis

        </div>


        <div class="card-body">


            <div class="row">


                <div class="col-md-4">

                    <b>Kode Servis</b>

                    <p>
                        <?php echo e($servis->kode_servis); ?>

                    </p>

                </div>



                <div class="col-md-4">

                    <b>Tanggal</b>

                    <p>
                        <?php echo e($servis->tanggal_servis); ?>

                    </p>

                </div>



                <div class="col-md-4">

                    <b>Total</b>

                    <p>

                        Rp <?php echo e(number_format($servis->grand_total,0,',','.')); ?>


                    </p>

                </div>


            </div>


        </div>


    </div>






    <div class="card shadow">


        <div class="card-header bg-info text-white">

            Daftar Jasa Servis

        </div>


        <div class="card-body table-responsive">


            <table class="table table-bordered">


                <thead>

                    <tr>

                        <th>No</th>

                        <th>Pekerjaan</th>

                        <th>Biaya</th>

                        <th>Keterangan</th>

                    </tr>


                </thead>


                <tbody>


                <?php $__empty_1 = true; $__currentLoopData = $servis->detailServis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


                    <tr>


                        <td>
                            <?php echo e($loop->iteration); ?>

                        </td>


                        <td>
                            <?php echo e($item->nama_pekerjaan); ?>

                        </td>


                        <td>

                            Rp <?php echo e(number_format($item->biaya_jasa,0,',','.')); ?>


                        </td>


                        <td>

                            <?php echo e($item->keterangan ?? '-'); ?>


                        </td>


                    </tr>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>


                    <tr>

                        <td colspan="4"
                            class="text-center">

                            Belum ada jasa.

                        </td>

                    </tr>


                <?php endif; ?>


                </tbody>


            </table>


        </div>


    </div>




    <br>


    <a href="<?php echo e(route('servis.index')); ?>"
       class="btn btn-secondary">

        Kembali

    </a>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/detail-servis/show.blade.php ENDPATH**/ ?>