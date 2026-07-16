<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Bengkel Maju Motor')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

<div class="wrapper">

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Content --}}
    <div id="content">

        {{-- Navbar --}}
        @include('components.navbar')

        <main class="container-fluid py-4">

            @yield('content')

        </main>

        {{-- Footer --}}
        @include('components.footer')

    </div>

</div>

{{-- SweetAlert Success --}}
@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded',function(){

    Swal.fire({

        icon:'success',

        title:'Berhasil',

        text:'{{ session("success") }}',

        confirmButtonColor:'#0d6efd',

        timer:2000,

        showConfirmButton:false

    });

});
</script>
@endif

{{-- SweetAlert Error --}}
@if(session('error'))
<script>
document.addEventListener('DOMContentLoaded',function(){

    Swal.fire({

        icon:'error',

        title:'Oops...',

        text:'{{ session("error") }}',

        confirmButtonColor:'#dc3545'

    });

});
</script>
@endif

{{-- SweetAlert Delete --}}
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

</html>