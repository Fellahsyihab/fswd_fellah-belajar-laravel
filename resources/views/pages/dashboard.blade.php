@extends('layouts.main')

@section('konten')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Jumlah semua produk -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalProducts }}</h3>
                <p>Jumlah semua produk</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Jumlah kategori produk -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalCategories }}</h3>
                <p>Jumlah kategori produk</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Jumlah total harga semua produk -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalPrice }}</h3>
                <p>Jumlah total harga semua produk</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Jumlah stok semua produk -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalStock }}</h3>
                <p>Jumlah stok semua produk</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- Grafik -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Jumlah produk per kategori (Column Chart)
            </div>
            <div class="card-body">
                <div id="productsPerCategoryChart"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Jumlah total harga produk per kategori (Pie Chart)
            </div>
            <div class="card-body">
                <div id="totalPricePerCategoryChart"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- Highcharts JS -->
<script src="{{ asset('node_modules/highcharts/highcharts.js') }}"></script>
<!-- Script untuk chart -->


<!-- Script untuk chart -->
<script>
    // Chart jumlah produk per kategori
    var productsPerCategoryData = {!! json_encode($categories->pluck('products_count')) !!};
    Highcharts.chart('productsPerCategoryChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah produk per kategori'
        },
        xAxis: {
            categories: {!! json_encode($categories->pluck('name')) !!}
        },
        yAxis: {
            title: {
                text: 'Jumlah Produk'
            }
        },
        series: [{
            name: 'Produk',
            data: productsPerCategoryData
        }]
    });

    // Chart jumlah total harga produk per kategori
    var totalPricePerCategoryData = {!! json_encode($categories->pluck('products')->pluck('sum_price')) !!};
    Highcharts.chart('totalPricePerCategoryChart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Jumlah total harga produk per kategori'
        },
        series: [{
            name: 'Total Harga',
            data: totalPricePerCategoryData.map(function (value, index) {
                return {
                    name: {!! json_encode($categories->pluck('name')) !!}[index],
                    y: value
                };
            })
        }]
    });
</script>
@endpush
