@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> List Top 10 Agent</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">List Top 10 Agent</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x:auto; ">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead class="thead-dark">
                            <tr>
                                <th>no</th>
                                <th>Agent Name</th>
                                <th>Jumlah Customer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($agents->take(10) as $agent)
                            <tr>
                                <th>{{ ++$no }}</th>
                                <th>{{ $agent->first_name.' '.$agent->last_name ?? ''}}</th>
                                <th>{{ $agent->jumlah_customer ?? ''}} Customer</th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection