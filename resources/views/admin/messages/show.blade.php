@extends('layouts.dashboard')

@section('title', 'Message de ' . $message->name)

@section('content')

    <h1>@yield('title')</h1>

    <div class="d-flex justify-content-between">
        <h4 class="text-secondary">

            <i class="bi bi-envelope-at-fill"></i>
            Email: <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
        </h4>
        <h4 class="text-secondary">
            <i class="bi bi-calendar-date-fill"></i>
            Envoyé le : {{ \Carbon\Carbon::parse($message->created_at)->format('d M Y') }}
        </h4>
    </div>
    <hr>
    <p class="mt-5">
        {{ $message->content }}
    </p>
    <div class="d-flex justify-content-between">
        <form action="{{ route('messages.read', $message->id) }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="read" value="{{ !$message->read }}">
            <button type="submit" class="btn btn-{{ $message->read ? 'secondary' : 'primary' }}">
                Marquer comme {{ $message->read ? 'non' : '' }} lu
            </button>
        </form>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Supprimer
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Voulez vous vraiment supprimer ce message ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <form action="{{ route('messages.destroy', $message->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Suprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
