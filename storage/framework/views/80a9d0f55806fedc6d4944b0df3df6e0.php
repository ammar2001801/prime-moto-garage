<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <i class="fas fa-motorcycle fa-4x text-primary"></i>

                    <h2 class="mt-3 fw-bold">

                        Prime Moto Garage

                    </h2>

                    <p class="text-muted">

                        Professional Motorcycle Service

                    </p>

                </div>

                <form method="POST" action="<?php echo e(route('login')); ?>">

                    <?php echo csrf_field(); ?>

                    <div class="mb-3">

                        <label class="form-label">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Masukkan Email"
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan Password"
                            required>

                    </div>

                    <button class="btn btn-primary w-100">

                        <i class="fas fa-sign-in-alt"></i>

                        Login

                    </button>

                </form>

                <div class="text-center mt-4">

                    Belum punya akun?

                    <a href="<?php echo e(route('register')); ?>">

                        Daftar Disini

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bengkel-app\resources\views/auth/login.blade.php ENDPATH**/ ?>