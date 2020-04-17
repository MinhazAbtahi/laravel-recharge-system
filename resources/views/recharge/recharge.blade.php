@extends('layouts.app', ['activePage' => 'recharge', 'titlePage' => __('Recharge')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('recharge.edit') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Recharge') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
                {{-- @if (session('status') == 'completed') --}}
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        {{-- <a href="{{ route('recharge_report') }}" class="btn btn-primary text-right">{{ __('View Report') }}</a> --}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        {{-- <button type="button" class="btn btn-info btn-sm close"  aria-label="Close">
                            <a href="{{ route('recharge_report') }}">{{ __('View Report') }}</a>
                        </button> --}}
                        <span>{{ 'Recharge Successfully Completed!' }}</span>
                      </div>
                    </div>
                  </div>
                  {{-- @elseif (session('status') == 'failed') --}}
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
                {{-- @endif --}}
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Operator Type') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <p>
                                <label style="margin-right: 40px">
                                  <input class="with-gap" name="type" id="radio_type1" type="radio" value="Pre-Paid"/>
                                  <span>Pre-Paid </span>
                                </label>

                                <label>
                                    <input class="with-gap" name="type" id="radio_type2" type="radio" value="Post-Paid"/>
                                    <span>Post-Paid </span>
                                </label>
                              </p>
                        </div>
                      </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Operator') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select class="selectpicker" data-style="btn-primary" name="operator">
                                <option value="1" disabled selected>Operators </option>
                                <option value="Airtel">Airtel</option>
                                <option value="Banglalink">Banglalink</option>
                                <option value="GrameenPhone">GrameenPhone</option>
                                <option value="Robi">Robi</option>
                                <option value="Teletalk">Teletalk</option>
                              </select>
                        </div>
                      </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Mobile No') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="mobile_no" id="mobile_no" type="number" placeholder="{{ __('Mobile No') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Amount') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="amount" id="amount" type="number" placeholder="{{ __('Amount') }}" value="" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Recharge') }}</button>
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
