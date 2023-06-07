@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">PENGAJARAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{ route('pengajaran.create') }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                                    <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #8A00B9;">
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Mata Kuliah</th>
                                                <th scope="col">Jenis <br>Mata Kuliah</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Tahun Ajar</th>
                                                <th scope="col">Jumlah <br>Mahasiswa</th>
                                                <th scope="col">SKS</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Algoritma dan Pemrograman</td>
                                                <td>Wajib</td>
                                                <td>SI-R41/19</td>
                                                <td>2019 - 2020 (Ganjil)</td>
                                                <td>20</td>
                                                <td>3</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="row-3 text-center">
                                                            <a href="">
                                                                <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Algoritma dan Pemrograman</td>
                                                <td>Wajib</td>
                                                <td>SI-R41/19</td>
                                                <td>2019 - 2020 (Ganjil)</td>
                                                <td>20</td>
                                                <td>3</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="row-3 text-center">
                                                            <a href="">
                                                                <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Algoritma dan Pemrograman</td>
                                                <td>Wajib</td>
                                                <td>SI-R41/19</td>
                                                <td>2019 - 2020 (Ganjil)</td>
                                                <td>20</td>
                                                <td>3</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="row-3 text-center">
                                                            <a href="">
                                                                <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Algoritma dan Pemrograman</td>
                                                <td>Wajib</td>
                                                <td>SI-R41/19</td>
                                                <td>2019 - 2020 (Ganjil)</td>
                                                <td>20</td>
                                                <td>3</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="row-3 text-center">
                                                            <a href="">
                                                                <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="">
                                                                <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="">
                                                                <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                    <nav aria-label="...">
                                        <ul class="pagination my-3 justify-content-end">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                        </nav>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
@endsection