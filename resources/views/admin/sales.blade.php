@extends('layouts.app', ['activePage' => 'Sales', 'titlePage' => __('Sales')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Sales</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class=" text-primary">
                  <tr>
                    <th class="center">#ID</th>
                    <th>Operator</th>
                    <th>Sales</th>
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
      </div>
    </div>
  </div>
</div>
@endsection
