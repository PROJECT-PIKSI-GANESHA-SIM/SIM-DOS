@extends('layouts.akademik-dashboard')

@section('title')

@endsection

@section('content')
<div class="card shadow bg-white card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-screwdriver fa-lg pe-2"></i>
            <span class="fw-bold fs-5">CONFIG ACCOUNT</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <a href="{{ route('config.create') }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #8A00B9;">
                                            <tr class="text-center">
                                                <th scope="col" style="width: 10%;">No</th>
                                                <th scope="col" style="width: 20%;">NIDN</th>
                                                <th scope="col" style="width: 50%;">Email</th>
                                                <th scope="col" style="width: 20%;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        // Tangkap elemen checkbox
        var checkbox = $('#flexSwitchCheckDefault');

        // Tambahkan event click
        checkbox.on('click', function() {
            // Ambil nilai status checkbox (dicentang atau tidak)
            var status = $(this).prop('checked') == true ? 1 : 0;
            // var user_id = $(this).data('id');

            // if (status == 1) {
            //     $('#flexSwitchCheckDefault').prop('checked', true);
            // } else {
            //     // Jika status bukan 1 (mungkin 0), maka toggle button tidak aktif (tidak tercentang)
            //     $('#flexSwitchCheckDefault').prop('checked', false);
            // }

            console.log(status);

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'pesan/update',
                data: {'status': status},
                success: function(response) {
                    // Tanggapi hasil dari server
                    console.log(response);
                    // alert(response.message);
                },
                error: function(xhr, status, error) {
                    // Tanggapi kesalahan dari server
                    console.log(xhr.responseText);
                    alert('Terjadi kesalahan pada server. Coba lagi nanti.');
                }
            });
        });
    });

</script>
@endsection