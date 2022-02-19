@extends('layouts.user')

@section('content')
{{-- <div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card shadow bg-primary text-white border-0">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-3 text-center">
                  <span class="circle circle-sm bg-primary-light">
                    <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                  </span>
                </div>
                <div class="col pr-0">
                  <p class="small text-white mb-0">Data Dummy</p>
                  <span class="h3 mb-0 text-white">$1250</span>
                  <span class="small text-white">+5.5%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card shadow border-0">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-3 text-center">
                  <span class="circle circle-sm bg-primary">
                    <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                  </span>
                </div>
                <div class="col pr-0">
                  <p class="small text-muted mb-0">Data Dummy</p>
                  <span class="h3 mb-0">1,869</span>
                  <span class="small text-success">+16.5%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card shadow border-0">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-3 text-center">
                  <span class="circle circle-sm bg-primary">
                    <i class="fe fe-16 fe-filter text-white mb-0"></i>
                  </span>
                </div>
                <div class="col">
                  <p class="small text-muted mb-0">Data Dummy</p>
                  <div class="row align-items-center no-gutters">
                    <div class="col-auto">
                      <span class="h3 mr-2 mb-0"> 86.6% </span>
                    </div>
                    <div class="col-md-12 col-lg">
                      <div class="progress progress-sm mt-2" style="height:3px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card shadow border-0">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-3 text-center">
                  <span class="circle circle-sm bg-primary">
                    <i class="fe fe-16 fe-activity text-white mb-0"></i>
                  </span>
                </div>
                <div class="col">
                  <p class="small text-muted mb-0">Data Dummy</p>
                  <span class="h3 mb-0">$80</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end section -->
      <div class="row align-items-center my-2">
        <div class="col-auto ml-auto">
          <form class="form-inline">
            <div class="form-group">
              <label for="reportrange" class="sr-only">Date Ranges</label>
              <div id="reportrange" class="px-2 py-2 text-muted">
                <i class="fe fe-calendar fe-16 mx-2"></i>
                <span class="small"></span>
              </div>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
              <button type="button" class="btn btn-sm"><span class="fe fe-filter fe-12 text-muted"></span></button>
            </div>
          </form>
        </div>
      </div>
      <!-- charts-->
      <div class="row my-4">
        <div class="col-md-12">
          <div class="chart-box">
            <div id="chartku"></div>
          </div>
        </div> <!-- .col -->
      </div> <!-- end section -->
    </div>
  </div>
</div> --}}

{{-- SCRIPT --}}
@include('inc.script')
{{-- <script>
  var options = {
    chart: {
      type: 'area'
    },
    stroke: {
      curve: 'smooth',
    },
    series: [{
      name: 'sales',
      data: [30,40,35,50,49,60,70,91,125]
    }],
    xaxis: {
      categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
    }
  }

  var chart = new ApexCharts(document.querySelector("#chartku"), options);

  chart.render();
</script> --}}

@endsection