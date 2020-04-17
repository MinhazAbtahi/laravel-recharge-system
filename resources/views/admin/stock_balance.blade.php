@extends('layouts.app', ['activePage' => 'Stock Balance', 'titlePage' => __('Stock Balance')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Stock Balance</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
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
      </div>
    </div>
  </div>
</div>
@endsection
