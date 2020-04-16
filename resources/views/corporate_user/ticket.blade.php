@extends('layouts.app', ['activePage' => 'tickets', 'titlePage' => __('Tickets')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('ticket.edit') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Tickets') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Ticket Type') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select class="selectpicker" data-style="btn-primary" name="ticket_type">
                                <option value="1" disabled selected>Ticket Type</option>
                                <option value="Query">Query</option>
                                <option value="Request">Request</option>
                                <option value="Complain">Complain</option>
                                <option value="Feedback">Feedback</option>
                              </select>
                        </div>
                      </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Ticket For') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select class="selectpicker" data-style="btn-primary" name="ticket_for">
                                <option value="1" disabled selected>Ticket For</option>
                                <option value="Recharge">Recharge</option>
                                <option value="Refill">Refill</option>
                                <option value="Invoice">Invoice</option>
                              </select>
                        </div>
                      </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="description"  id="description" rows="5" placeholder="{{ __('Ticket Description...') }}" value="" required="true" aria-required="true"></textarea>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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
