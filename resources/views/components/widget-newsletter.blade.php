<h2 class="widget-title text-white d-inline-block mt-4">S'abonner</h2>
<p class="mt-4">
    Abonnez-vous à notre Newsletter pour rester au courant de nos nouveaux
    posts et informations !
</p>
<form action="{{ route('blog.newsletter') }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control bg-transparent rounded-0 my-4"
            placeholder="Entrez votre email ici..." value="{{ old('email') }}" required>
        @error('email')
            <div class="text-white font-bold mb-2">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary" type="submit">S'abonner <i class="fas fa-envelope"></i></button>
    </div>
</form>
