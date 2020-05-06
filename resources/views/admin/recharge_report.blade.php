@extends('layouts.app', ['activePage' => 'Recharge Report', 'titlePage' => __('Recharge Report')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Recharge Report</h4>
            <p class="card-category"> Recharge Report for All Users</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class=" text-primary">
                  <tr>
                    <th class="center">#ID</th>
                    <th>Sender </th>
                    <th>Mobile</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Operator</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($recharges as $recharge)
                        <tr>
                            <td>{{ $recharge->id }}</td>
                            <td>{{ $recharge->user }}</td>
                            <td class="text-primary">
                                <strong>{{ $recharge->mobile_no }}</strong>
                            </td>
                            <td class="text-primary">
                                <strong>{{ $recharge->amount }}</strong>
                            </td>
                            <td>{{ $recharge->type }}</td>
                            <td>{{ $recharge->operator }}</td>
                            <td class="text-success">
                                <strong>{{ $recharge->status }}</strong>
                            </td>
                            <td>{{ $recharge->created_at }}</td>
                        </tr>
                    @endforeach
                  <!--<tr>
                    <td>1</td>
                    <td>Abtahi</td>
                    <td>01533149070</td>
                    <td class="text-primary">38</td>
                    <td>Pre-Paid</td>
                    <td>Teletalk</td>
                    <td>Success</td>
                    <td>5 Jan 2020 at 05:35:52 am</td>
                  -->
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
</div>
@endsection
