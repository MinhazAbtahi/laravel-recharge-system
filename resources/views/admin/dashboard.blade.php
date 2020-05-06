@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        {{-- Admin Stats --}}
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assessment</i>
                </div>
                <p class="card-category">Pending Requests</p>
                <h3 class="card-title">0
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="#" class="btn btn-outline-primary btn-sm">
                      View Details
                  </a>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-secondary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assessment</i>
                </div>
                <p class="card-category">Unpaid Requests</p>
                <h3 class="card-title">0
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="#" class="btn btn-outline-primary btn-sm">
                      View Details
                  </a>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assessment</i>
                </div>
                <p class="card-category">Successful Requests</p>
                <h3 class="card-title">0
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="#" class="btn btn-outline-primary btn-sm">
                      View Details
                  </a>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assessment</i>
                </div>
                <p class="card-category">Failed Requests</p>
                <h3 class="card-title">0
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                  <div class="stats">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        View Details
                    </a>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assessment</i>
                </div>
                <p class="card-category">Total Requests</p>
                <h3 class="card-title">0
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="#" class="btn btn-outline-primary btn-sm">
                      View Details
                  </a>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assessment</i>
                </div>
                <p class="card-category">Successful Recharge</p>
                <h3 class="card-title">0
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="#" class="btn btn-outline-primary btn-sm">
                      View Details
                  </a>
                  </div>
                </div>
            </div>
          </div>
      </div>

      <div class="row">
        {{-- Stock Balance Table --}}
        <div class="col-lg-5 col-md-5">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Stock Balance</h4>
                <p class="card-category">Total Stock Balance by Operators</p>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead class=" text-primary">
                      <tr>
                        <th class="center">#ID</th>
                        <th>Operator</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($recharges as $recharge)
                            <tr>
                                <td>{{ $recharge->id }}</td>
                                <td>{{ $recharge->operator }}</td>
                                <td class="text-primary">
                                    <strong>{{ $recharge->amount }}</strong>
                                </td>
                            </tr>
                        @endforeach
                      </tr>
                    </tbody>
                  <tfoot>
                      <tr>
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

          {{-- Sales Table --}}
          <div class="col-lg-7 col-md-7">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Sales</h4>
                  <p class="card-category">Total Sales Data by Operators</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                    <thead class=" text-primary">
                        <tr>
                          <th class="center">#ID</th>
                          <th>Operator</th>
                          <th>Sales</th>
                          <th>Time</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($recharges as $recharge)
                              <tr>
                                  <td>{{ $recharge->id }}</td>
                                  <td>{{ $recharge->operator }}</td>
                                  <td class="text-primary">
                                      <strong>{{ $recharge->amount }}</strong>
                                  </td>
                                  <td>{{ $recharge->created_at }}</td>
                              </tr>
                          @endforeach
                        </tr>
                      </tbody>
                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
@endsection

@push('js')
    {{-- {!! $chart1->script() !!}
    {!! $chart2->script() !!} --}}
  <script>
    // $(document).ready(function() {
    //   // Javascript method's body can be found in assets/js/demos.js
    //   md.initDashboardPageCharts();
    // });

  </script>
@endpush
