@extends('layouts.app', ['activePage' => 'Tickets', 'titlePage' => __('Tickets')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Tickets</h4>
            <p class="card-category"> All Tickets from Users</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class=" text-primary">
                  <tr>
                    <th class="center">#ID</th>
                    <th>Ticket Type</th>
                    <th>Ticket For</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td class="text-secondary">
                                <strong>{{ $ticket->ticket_type }}</strong>
                            </td>
                            <td class="text-secondary">
                                <strong>{{ $ticket->ticket_for }}</strong>
                            </td>
                            <td class="text-primary">
                                <strong>{{ $ticket->description }}</strong>
                            </td>
                            <td class="text-success">
                                <strong>{{ $ticket->status }}</strong>
                            </td>
                            <td>{{ $ticket->created_at }}</td>
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

                  </tr>
                  -->
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
