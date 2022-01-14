@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> List Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">List order</a></li>
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
                <form action="{{ route('frontend.order.index') }}" method="get">

                  <div class="row">
                    <div class="col-lg-12">
                      <label>filter</label>
                    </div>
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="invoice_id">Invoice ID</label>
                            <input value="{{ request()->invoice_id }}" type="text" id="invoice_id" name="invoice_id" placeholder="Masukkan Invoice Id yang dicari" class="form-control @if(request()->invoice_id) border border-success @endif">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                              <option value="" selected disabled>-- Pilih Status --</option>
                              <option value="1">New Order</option>
                              <option value="2">Payment Success</option>
                              <option value="3">Order Success</option>
                              <option value="4">Order Completed</option>
                              <option value="5">Order Cancel</option>
                              <option value="6">Payment Pending</option>
                              <option value="7">Payment Failed</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="delivery_date_since">Registrasi sejak</label>
                        <input value="{{ request()->delivery_date_since }}" type="date" id="delivery_date_since" name="delivery_date_since"class="form-control @if(request()->delivery_date_since) border border-success @endif">
                      </div>
                      <div class="form-group">
                        <label for="delivery_date_until">Registrasi Sampai</label>
                        <input value="{{ request()->delivery_date_until }}" type="date" id="delivery_date_until" name="delivery_date_until" class="form-control @if(request()->delivery_date_until) border border-success @endif">
                      </div>
                    </div>
                    <div class="col-lg-12">
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
                            <a href="{{ route('frontend.order.index', request()->query()) }}" type="button" class="btn btn-md btn-secondary w-100"><i class="fas fa-sync"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label>Reset filter</label><br>
                            <a href="{{ route('frontend.order.index') }}" type="button" class="btn btn-md btn-warning w-100"><i class="fas fa-redo"></i></a>
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
                                <th>invoice id</th>
                                <th>Status</th>
                                <th>delivery date</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                            <tr>
                                <th>{{ $key+ $orders->firstItem() }}</th>
                                <th>{{ $order->invoice_id ?? ''}}</th>
                                <th>
                                    @if($order->status == '1') New Order @endif
                                    @if($order->status == '2') Payment Success @endif
                                    @if($order->status == '3') Order Success @endif
                                    @if($order->status == '4') Order Completed @endif
                                    @if($order->status == '5') Order Cancel @endif
                                    @if($order->status == '6') Payment Pending @endif
                                    @if($order->status == '7') Payment Failed @endif
                                </th>
                                <th>{{ $order->delivery_date->format('d-m-Y') }}</th>
                                <th>
                                    <div class="dropdown">
                                        <button  button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('frontend.order.detail', $order->id) }}">Detail</a><hr>
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
                    {!! $orders->appends(request()->query())->onEachSide(0)->links() !!}
                    </div>
                </div>
              </div>
              <div class="card-footer">
                  Total data: {{ $orders_count }}
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