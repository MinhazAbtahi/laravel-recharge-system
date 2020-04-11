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
                <h3 class="card-title">32
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="{{ route('recharge') }}" class="btn btn-outline-primary btn-sm">
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
                <h3 class="card-title">20
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="{{ route('recharge') }}" class="btn btn-outline-primary btn-sm">
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
                <h3 class="card-title">50
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="{{ route('recharge') }}" class="btn btn-outline-primary btn-sm">
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
                <h3 class="card-title">42
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                  <div class="stats">
                    <a href="{{ route('recharge') }}" class="btn btn-outline-primary btn-sm">
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
                <h3 class="card-title">150
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="{{ route('recharge') }}" class="btn btn-outline-primary btn-sm">
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
                <h3 class="card-title">50
                </h3>
              </div>
              <div class="card-footer">
                <i class="material-icons">table_chart</i>
                <div class="stats">
                  <a href="{{ route('recharge') }}" class="btn btn-outline-primary btn-sm">
                      View Details
                  </a>
                  </div>
                </div>
            </div>
          </div>
      </div>

        {{-- User Ledger --}}
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Ledger</h4>
              <p class="card-category">New employees on 15th September, 2016</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Time</th>
                  <th>Description</th>
                  <th>Debit</th>
                  <th>Credit</th>
                  <th>Balance</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Saturday, 27 Jul 2019 at 05:35:52 am</td>
                    <td>2 Number(s) Recharge. Ref: 0b5d6850-b02f-11e9-b82f-5d906471783f</td>
                    <td>0</td>
                    <td>38</td>
                    <td>1012</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Saturday, 27 Jul 2019 at 05:34:58 am</td>
                    <td>2 Number(s) Recharge. Ref: 0b5d6850-b02f-11e9-b82f-5d906471783f</td>
                    <td>0</td>
                    <td>38</td>
                    <td>974</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Saturday, 27 Jul 2019 at 05:29:30 am</td>
                    <td>2 Number(s) Recharge. Ref: 0b5d6850-b02f-11e9-b82f-5d906471783f</td>
                    <td>0</td>
                    <td>38</td>
                    <td>936</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Friday, 1 June 2019 at 05:35:52 am</td>
                    <td>2 Number(s) Recharge. Ref: 0b5d6850-b02f-11e9-b82f-5d906471783f</td>
                    <td>0</td>
                    <td>38</td>
                    <td>898</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Friday, 1 June 2019 at 05:29:20 am</td>
                    <td>2 Number(s) Recharge. Ref: 0b5d6850-b02f-11e9-b82f-5d906471783f</td>
                    <td>0</td>
                    <td>38</td>
                    <td>860</td>
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
