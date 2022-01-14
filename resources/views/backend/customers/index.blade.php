@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">List Customers</li>
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
          <h3 class="card-title">List Customers</h3>

          <div class="card-tools">
            <a href="{{ route('backend.customers.create') }}" class="btn btn-sm btn-success">
              <i class="fas fa-plus"></i> Tambah Data
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div><br>
        </div>
        <div class="card-body">
        <form action="{{ route('backend.customers.index') }}" method="get">

            <div class="row">
              <div class="col-lg-12">
                <label>filter</label>
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="first_name">nama depan</label>
                      <input value="{{ request()->first_name }}" type="text" id="first_name" name="first_name" placeholder="Masukkan nama depan yang dicari" class="form-control @if(request()->first_name) border border-success @endif">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="last_name">nama belakang</label>
                      <input value="{{ request()->last_name }}" type="text" id="last_name" name="last_name" placeholder="Masukkan nama belakang yang dicari" class="form-control @if(request()->last_name) border border-success @endif">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone">no hp</label>
                  <input value="{{ request()->phone }}" type="number" id="phone" name="phone" placeholder="Masukkan nomor telepon" class="form-control @if(request()->phone) border border-success @endif">
                </div>
                <div class="form-group">
                  <label for="address">Alamat</label>
                  <input value="{{ request()->address }}" type="text" id="address" name="address" placeholder="Masukkan alamat" class="form-control @if(request()->address) border border-success @endif">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="created_at_since">Registrasi sejak</label>
                  <input value="{{ request()->created_at_since }}" type="date" id="created_at_since" name="created_at_since"class="form-control @if(request()->created_at_since) border border-success @endif">
                </div>
                <div class="form-group">
                  <label for="created_at_until">Registrasi Sampai</label>
                  <input value="{{ request()->created_at_until }}" type="date" id="created_at_until" name="created_at_until" class="form-control @if(request()->created_at_until) border border-success @endif">
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Cari data</label><br>
                      <button type="submit" class="btn btn-md btn-success w-100"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Refresh laman</label><br>
                      <a href="{{ route('backend.customers.index', request()->query()) }}" type="button" class="btn btn-md btn-secondary w-100"><i class="fas fa-sync"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Reset filter</label><br>
                      <a href="{{ route('backend.customers.index') }}" type="button" class="btn btn-md btn-warning w-100"><i class="fas fa-redo"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-lg-12" style="overflow-x:auto; ">
              <table class="table table-bordered table-hover text-nowrap">
                <thead class="thead-dark">
                  <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>alamat</th>
                    <th>nomor telepon</th>
                    <th>registrasi pada</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($customers as $key => $customer)
                  <tr>
                    <th>{{ $key+ $customers->firstItem() }}</th>
                    <th>{{ $customer->first_name.' '.$customer->last_name ?? ''}}</th>
                    <th>{{ $customer->customer->address ?? '' }}</th>
                    <th>{{ $customer->phone ?? '' }}</th>
                    <th>{{ $customer->created_at->format('d-m-Y') }}</th>
                    <th>
                      <div class="dropdown">
                        <button  button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                          action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ route('backend.customers.edit', $customer->id) }}">Edit</a>
                          <a class="dropdown-item" href="{{ route('backend.customers.detail', $customer->id) }}">Detail</a><hr>
                          <form action="{{ route('backend.customers.destroy', $customer->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                          </form>
                        </div>
                      </div>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-end">
              {!! $customers->appends(request()->query())->onEachSide(0)->links() !!}
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Total Data: {{ $customers_count}}
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection