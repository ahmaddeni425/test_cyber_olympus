@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('backend.customers.index')}}">List Customers</a></li>
              <li class="breadcrumb-item active">Create Customers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Customers</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('backend.customers.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input value="{{ old('first_name') }}" type="text" id="first_name" name="first_name" placeholder="Masukkan nama depan" class="form-control border @error('first_name') border-danger @enderror">
                                @error('first_name')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input value="{{ old('last_name') }}" type="text" id="last_name" name="last_name" placeholder="Masukkan nama belakang" class="form-control border @error('last_name') border-danger @enderror">
                                @error('last_name')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input value="{{ old('email') }}" type="email" id="email" name="email" placeholder="Masukkan email" class="form-control border @error('email') border-danger @enderror">
                                @error('email')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone">No. Hp</label>
                                <input value="{{ old('phone') }}" type="number" id="phone" name="phone" placeholder="Masukkan No Hp" class="form-control border @error('phone') border-danger @enderror">
                                @error('phone')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Masukkan password" class="form-control border @error('password') border-danger @enderror">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang password" class="form-control border @error('password') border-danger @enderror">
                            </div>
                        </div>
                        @error('password')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control border @error('address') border-danger @enderror"" placeholder="Masukkan alamat">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-md btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Create Data Customers
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection