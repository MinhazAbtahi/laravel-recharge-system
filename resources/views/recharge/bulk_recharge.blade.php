@extends('layouts.app', ['activePage' => 'recharge', 'titlePage' => __('Recharge')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Recharge') }}</h4>
                        <p class="card-category">{{ __('Bulk Recharge(CSV/Excel)') }}</p>
                    </div>
                    <div class="card-body ">
                         @if (session('status') == 'completed')
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ 'Recharge Successfully Completed!' }}</span>
                      </div>
                    </div>
                  </div>
                  @elseif (session('status') == 'failed')
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ 'Recharge Failed. Not Enough Balance!' }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                        <div class="form-inline">
                            <span class="btn btn-primary fileinput-button">
                                <i class="material-icons">attach_file</i>
                                <input type="file" name="files[]" multiple>
                            </span>
                            <button type="button" class="btn btn-success start" data-ng-click="submit()">
                                <i class="material-icons">cloud_upload</i>
                                <span>Start upload</span>
                            </button>
                            <button type="reset" class="btn btn-warning cancel">
                                <i class="material-icons">cancel</i>
                                <span>Cancel upload</span>
                            </button>
                            <button type="button" class="btn btn-danger delete">
                                <i class="material-icons">delete</i>
                                <span>Delete</span>
                            </button>
                        </div>

                        <br>
                        <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Recharge Data</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>Mobile No</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Operator</th>
       </tr>
       {{-- @foreach($data as $row)
       <tr>
        <td>{{ $row->CustomerName }}</td>
        <td>{{ $row->Gender }}</td>
        <td>{{ $row->Address }}</td>
        <td>{{ $row->City }}</td>
        <td>{{ $row->PostalCode }}</td>
        <td>{{ $row->Country }}</td>
       </tr>
       @endforeach --}}
      </table>
     </div>
    </div>
    <div class="card-footer ml-auto mr-auto">
        <span></span>
        <button type="submit" class="btn btn-primary">{{ __('Recharge') }}</button>
      </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
  </script>
@endpush
