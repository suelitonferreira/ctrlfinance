@extends('layouts.base')
    @section('head-title')
        <title>CTRLFinance - Dashboard</title>
    @endsection
    @section('head-link')
        <link rel="stylesheet" href="{{ asset('assets/demo/demo.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css')}}">
    @endsection
    @section('content')
      <div class="container-lg conteudo">
        <h1>Dashboard</h1>
        <br>
        <div class="row ">
          <div class="col-lg-9">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Ano base: {{ date('Y') }}</h5>
                    <h2 class="card-title">Desempenho Anual</h2>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-sm btn-primary btn-simple active" id="0">
                        <input type="radio" class="d-none d-sm-none" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Gasto</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-cart"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Investimento</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-bank"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="2">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Recebiveis</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-money-coins"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartBig1"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Saldo Mensal</h5>
                <h3 class="card-title"> 
                  @if ($saldo >= 0) 
                    <i class="tim-icons icon-coins text-success">
                  @else
                    <i class="tim-icons icon-coins text-danger">
                  @endif
                    </i> R$ {{$saldo}}</h3>
                </i> 
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartSaldo"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h3 class="card-title"><i class="tim-icons icon-coins text-warning"></i> Categorias</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartCategory"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Setores de Investimentos</h5>
                <h3 class="card-title"><i class="tim-icons icon-coins text-info"></i> R$ 0.00</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="CountryChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-lg-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">lista de Ativos</h5>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartAtivos"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
    @section('footer-script')
      <script src="{{ asset('assets/js/core/jquery.min.js')}}"></script>
      <script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>
      <!-- Chart JS -->
      <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
      <script src="{{ asset('assets/demo/demo.js')}}"></script>
      <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
      </script>
    @endsection 