<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Nouveau Mot de Passe</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmation du Mot de Passe</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Mettre à Jour</button>
</form>
