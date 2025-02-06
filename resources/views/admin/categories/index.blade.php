@extends('layouts.dashboard')

@section('title', 'Categories')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Categories</h1>

        <div class="align-items-center">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Créer une categorie</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Articles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ Str::limit($category->description) }}</td>
                        <td>{{ $category->posts->count() }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-sm">Modifier</a>
                            @if ($category->posts->count() === 0)
                                <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cette categorie ?')">Supprimer</button>
                                </form>
                            @else
                                <button type="button" class="btn btn-danger btn-sm" disabled>Supprimer</button>
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
