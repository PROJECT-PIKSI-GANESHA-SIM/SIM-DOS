@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-comment-dots fa-lg pe-2"></i>
            <span class="fw-bold fs-5">PESAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #8A00B9;">
                                            <tr class="text-center">
                                                <th scope="col" style="width: 10%;">No</th>
                                                <th scope="col" style="width: 60%;">Pesan</th>
                                                <th scope="col" style="width: 20%;">Action</th>
                                                <th scope="col" style="width: 10%;">Publish</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    @foreach ($pesan as $p)
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->message }}</td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="row-3 text-center">
                                                                    <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="">
                                                                        <a href="{{ route('pesan.edit', $p->id) }}">
                                                                            <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                                        </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-switch d-flex align-items-center justify-content-center">
                                                                <input name="publish" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                                                @if ($p->status == 1)
                                                                    checked
                                                                @endif
                                                                >
                                                                
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                </tr>
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