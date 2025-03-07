@extends('layouts.dashboard')

@section('title', 'Categories')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Messages</h1>
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Lu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($message->created_at)->format('d M Y - H:i:s') }}</td>
                        <td>
                            @if ($message->read)
                                <span class="badge bg-secondary">Lu</span>
                            @else
                                <span class="badge bg-primary">Non Lu</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2 align-items-center justify-content-between">
                            <a href="{{ route('messages.show', $message->id) }}" class="btn btn-success btn-sm rounded-pill">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#table');
    </script>
@endsection
