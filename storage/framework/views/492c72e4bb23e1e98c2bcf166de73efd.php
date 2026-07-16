

<?php $__env->startSection('title','Data Servis'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">


    <div class="d-flex justify-content-between mb-3">

        <h3>
            <i class="fas fa-tools"></i>
            Data Servis
        </h3>


        <a href="<?php echo e(route('servis.create')); ?>"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Servis

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
                               placeholder="Cari kode servis atau plat nomor..."
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


        <div class="card-header bg-primary text-white">

            Data Servis

        </div>




        <div class="card-body table-responsive">


            <table class="table table-bordered table-hover">


                <thead>


                    <tr>


                        <th>No</th>

                        <th>Kode</th>

                        <th>Tanggal</th>

                        <th>Pelanggan</th>

                        <th>Plat Nomor</th>

                        <th>Mekanik</th>

                        <th>Status</th>

                        <th>Total</th>

                        <th width="200">
                            Aksi
                        </th>


                    </tr>


                </thead>




                <tbody>


                <?php $__empty_1 = true; $__currentLoopData = $servis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


                    <tr>


                        <td>

                            <?php echo e($loop->iteration); ?>


                        </td>



                        <td>

                            <?php echo e($item->kode_servis); ?>


                        </td>



                        <td>

                            <?php echo e($item->tanggal_servis); ?>


                        </td>



                        <td>

                            <?php echo e($item->kendaraan->pelanggan->user->name ?? '-'); ?>


                        </td>



                        <td>

                            <?php echo e($item->kendaraan->plat_nomor ?? '-'); ?>


                        </td>



                        <td>

                            <?php echo e($item->mekanik->user->name ?? '-'); ?>


                        </td>



                        <td>


                            <?php if($item->status == 'Selesai'): ?>


                                <span class="badge bg-success">

                                    <?php echo e($item->status); ?>


                                </span>



                            <?php elseif($item->status == 'Dikerjakan'): ?>


                                <span class="badge bg-warning">

                                    <?php echo e($item->status); ?>


                                </span>



                            <?php else: ?>


                                <span class="badge bg-secondary">

                                    <?php echo e($item->status); ?>


                                </span>


                            <?php endif; ?>



                        </td>




                        <td>


                            Rp <?php echo e(number_format($item->grand_total ?? 0,0,',','.')); ?>



                        </td>




                        <td>



                            


                            <a href="<?php echo e(route('detail-servis.show',$item->id)); ?>"
                               class="btn btn-info btn-sm"
                               title="Detail Servis">


                                <i class="fas fa-tools"></i>


                            </a>




                            


                            <a href="<?php echo e(route('servis.edit',$item->id)); ?>"
                               class="btn btn-warning btn-sm"
                               title="Edit">


                                <i class="fas fa-edit"></i>


                            </a>





                            


                           <form action="<?php echo e(route('servis.destroy',$item->id)); ?>"
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


                        <td colspan="9"
                            class="text-center">


                            Belum ada data servis.


                        </td>


                    </tr>



                <?php endif; ?>




                </tbody>



            </table>




            <?php echo e($servis->links()); ?>




        </div>


    </div>



</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/servis/index.blade.php ENDPATH**/ ?>