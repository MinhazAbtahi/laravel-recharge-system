@extends('layouts.app', ['activePage' => 'Operators', 'titlePage' => __('Operators')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Operators</h4>
            <p class="card-category"> List of Available Operators & their Status</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class=" text-primary">
                  <tr>
                    <th class="center">#ID</th>
                    <th>Operator</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($operators as $operator)
                        <tr>
                            <td>{{ $operator->id }}</td>
                            <td class="text-primary">
                                <strong>{{ $operator->name}}</strong>
                            </td>
                            @if ($operator->status == 'Activated')
                                <td class="text-success">
                                    <strong>{{ $operator->status }}</strong>
                                </td>
                            @else
                                <td class="text-warning">
                                    <strong>{{ $operator->status }}</strong>
                                </td>
                            @endif

                            <td>{{ $operator->updated_at }}</td>
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
