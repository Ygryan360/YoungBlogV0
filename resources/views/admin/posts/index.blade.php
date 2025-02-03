@extends('layouts.dashboard')

@section('title', 'Articles')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Articles</h1>

        <div class="align-items-center">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Créer un article</a>
        </div>
    </div>

    <div class="table-responsive">
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Autheur</th>
                    <th>Dernière Modif</th>
                    <th>Vues</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ Str::limit($post->title, 25) }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->updated_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $post->views }}</td>
                        <td>
                            @if ($post->status === 'published')
                                <span class="badge bg-success">Publié</span>
                            @else
                                <span class="badge bg-warning">Brouillon</span>
                            @endif
                        </td>
                        <td>
                            @if ($post->status === 'published')
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('posts.changestatus', $post->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="draft" autocomplete="off">
                                    <button type="submit" class="btn btn-warning btn-sm"><i
                                            class="bi bi-archive"></i></button>
                                </form>
                            @else
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                                @if ($post->status === 'published')
                                @else
                                    <form action="{{ route('posts.changestatus', $post->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="status" value="published" autocomplete="off">
                                        <button type="submit" class="btn btn-success btn-sm"><i
                                                class="bi bi-send"></i></button>
                                    </form>
                                @endif
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
