<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title','Bengkel Maju Motor'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>

</head>

<body>

<div class="wrapper">

    
    <?php echo $__env->make('components.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div id="content">

        
        <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <main class="container-fluid py-4">

            <?php echo $__env->yieldContent('content'); ?>

        </main>

        
        <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    </div>

</div>


<?php if(session('success')): ?>
<script>
document.addEventListener('DOMContentLoaded',function(){

    Swal.fire({

        icon:'success',

        title:'Berhasil',

        text:'<?php echo e(session("success")); ?>',

        confirmButtonColor:'#0d6efd',

        timer:2000,

        showConfirmButton:false

    });

});
</script>
<?php endif; ?>


<?php if(session('error')): ?>
<script>
document.addEventListener('DOMContentLoaded',function(){

    Swal.fire({

        icon:'error',

        title:'Oops...',

        text:'<?php echo e(session("error")); ?>',

        confirmButtonColor:'#dc3545'

    });

});
</script>
<?php endif; ?>


<script>

document.addEventListener('DOMContentLoaded',function(){

    document.querySelectorAll('.form-delete').forEach(function(form){

        form.addEventListener('submit',function(e){

            e.preventDefault();

            Swal.fire({

                title:'Yakin ingin menghapus?',

                text:'Data tidak dapat dikembalikan.',

                icon:'warning',

                showCancelButton:true,

                confirmButtonText:'Ya, Hapus',

                cancelButtonText:'Batal',

                confirmButtonColor:'#dc3545',

                cancelButtonColor:'#6c757d'

            }).then((result)=>{

                if(result.isConfirmed){

                    form.submit();

                }

            });

        });

    });

});

</script>

</body>

</html><?php /**PATH C:\laragon\www\bengkel-app\resources\views/layouts/admin.blade.php ENDPATH**/ ?>