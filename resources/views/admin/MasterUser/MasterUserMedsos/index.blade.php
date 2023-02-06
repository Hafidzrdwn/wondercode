@extends('layouts.admin.app')
@section('title', "Data Medsos")

@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Data Media Sosial</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <a href="#" class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                            <a href="#" class="btn btn-icon btn-warning"><i class="fas fa-exclamation-triangle"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>
                            <a href="#" class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                            <a href="#" class="btn btn-icon btn-warning"><i class="fas fa-exclamation-triangle"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                            <a href="#" class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                            <a href="#" class="btn btn-icon btn-warning"><i class="fas fa-exclamation-triangle"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
