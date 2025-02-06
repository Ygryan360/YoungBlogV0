@extends('layouts.dashboard')

@section('title', 'Categories')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Tags</h1>

        <div class="align-items-center">
            <a href="{{ route('tags.create') }}" class="btn btn-primary">Créer un tag</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Articles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->posts->count() }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('tags.edit', $tag) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            @if ($tag->posts->count() === 0)
                                <form action="{{ route('tags.destroy', $tag) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Voulez-vous vraiment supprimer ce Tag ?')">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            @else
                                <button type="button" class="btn btn-danger btn-sm" disabled>
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            @endif
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
