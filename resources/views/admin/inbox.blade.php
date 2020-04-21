@extends('layouts.app', ['activePage' => 'Inbox', 'titlePage' => __('Inbox')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Inbox</h4>
            <p class="card-category"> Message from diffrent Operators</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class=" text-primary">
                  <tr>
                    <th class="center">Sender</th>
                    <th>Operator</th>
                    <th>Message</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->sender }}</td>
                            <td class="text-primary">
                                <td>{{ $message->operator }}</td>
                            </td>
                            <td class="text-primary">
                                <td>{{ $message->description }}</td>
                            </td>
                            <td>{{ $message->created_at }}</td>
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
