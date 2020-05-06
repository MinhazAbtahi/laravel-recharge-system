@extends('layouts.app', ['activePage' => 'recharge', 'titlePage' => __('Recharge')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ __('Recharge') }}</h4>
                  <p class="card-category">{{ __('Bulk Recharge(CSV/Excel)') }}</p>
                </div>
                <div class="card-body ">
                    <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                        <div class="form-inline">

                            <span class="btn btn-success fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Add files</span>
                                <input type="file" name="files[]" multiple>
                            </span>
                     <button type="button" class="btn btn-primary start" data-ng-click="submit()">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Start upload</span>
                            </button>
                                            <button type="reset" class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel upload</span>
                            </button>
                          <button type="button" class="btn btn-danger delete">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
  </script>
@endpush
