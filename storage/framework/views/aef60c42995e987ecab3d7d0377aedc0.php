

<?php $__env->startSection('title','Edit Pembayaran'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">


<div class="card shadow">

<div class="card-header bg-warning">

<h3>
<i class="fas fa-edit"></i>
Edit Pembayaran
</h3>

</div>


<div class="card-body">


<form action="<?php echo e(route('pembayaran.update',$pembayaran->id)); ?>"
method="POST">

<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>


<div class="mb-3">

<label>Servis</label>

<select name="servis_id" class="form-control">


<?php $__currentLoopData = $servis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($item->id); ?>"
<?php if($item->id == $pembayaran->servis_id): ?>
selected
<?php endif; ?>
>

<?php echo e($item->kode_servis); ?>

-
<?php echo e($item->kendaraan->plat_nomor); ?>


</option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</select>

</div>



<div class="mb-3">

<label>Tanggal Bayar</label>

<input type="date"
name="tanggal_bayar"
class="form-control"
value="<?php echo e(date('Y-m-d',strtotime($pembayaran->tanggal_bayar))); ?>">


</div>



<div class="mb-3">

<label>Total Tagihan</label>

<input type="number"
class="form-control"
value="<?php echo e($pembayaran->total_tagihan); ?>"
readonly>


</div>



<div class="mb-3">

<label>Jumlah Bayar</label>

<input type="number"
name="jumlah_bayar"
class="form-control"
value="<?php echo e($pembayaran->bayar); ?>">


</div>



<div class="mb-3">

<label>Kembalian</label>

<input type="number"
class="form-control"
value="<?php echo e($pembayaran->kembalian); ?>"
readonly>


</div>



<div class="mb-3">

<label>Metode Bayar</label>

<select name="metode_bayar"
class="form-control">


<option value="Cash"
<?php if($pembayaran->metode_bayar=="Cash"): ?>
selected
<?php endif; ?>
>
Cash
</option>


<option value="Transfer"
<?php if($pembayaran->metode_bayar=="Transfer"): ?>
selected
<?php endif; ?>
>
Transfer
</option>


</select>

</div>



<button class="btn btn-warning">

Update

</button>


<a href="<?php echo e(route('pembayaran.index')); ?>"
class="btn btn-secondary">

Kembali

</a>



</form>


</div>

</div>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/pembayaran/edit.blade.php ENDPATH**/ ?>