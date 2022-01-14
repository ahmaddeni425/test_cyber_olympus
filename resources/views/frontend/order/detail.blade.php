@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Detail Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Detail order</a></li>
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
                            <tr>
                                <th>invoice id</th>
                                <td>{{ $order->invoice_id}}</td>
                            </tr>
                            <tr>
                                <th>customer</th>
                                <td>{{ $order->customer->first_name.' '.$order->customer->last_name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>agent</th>
                                <td>{{ $order->agent->store_name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>status</th>
                                <td>
                                    @if($order->status == '1') New Order @endif
                                    @if($order->status == '2') Payment Success @endif
                                    @if($order->status == '3') Order Success @endif
                                    @if($order->status == '4') Order Completed @endif
                                    @if($order->status == '5') Order Cancel @endif
                                    @if($order->status == '6') Payment Pending @endif
                                    @if($order->status == '7') Payment Failed @endif
                                </td>
                            </tr>
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