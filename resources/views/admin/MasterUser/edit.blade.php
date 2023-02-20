@extends('layouts.admin.app')
@section('title', "Data User")

@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Data User</h1>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.update', $users->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ $users->username }}" class="form-control">
                        <br>
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="{{ $users->email }}" class="form-control">
                        <br>
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" value="{{ $users->password }}" class="form-control">
                        <br>
                        <label for="status">Admin</label>
                        <select class="form-control" name="is_admin" id="status">
                            @if($users->is_admin == 1)
                            <option value="1" selected>Admin</option>
                            @else
                            <option value="0" selected>User</option>
                            @endif
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
