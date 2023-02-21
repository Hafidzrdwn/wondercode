@extends('layouts.admin.app')
@section('title', "Data User")

@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Data User</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->is_admin == 1)
                            <div class="badge bg-success text-dark">Admin</div>
                            @else
                            <div class="badge bg-secondary text-dark">User</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                            <form class="d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-icon btn-warning"><i class="fas fa-exclamation-triangle"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
