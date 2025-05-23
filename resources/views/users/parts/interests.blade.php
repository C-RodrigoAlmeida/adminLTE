<div class="card">
    <form 
        action="{{ route('users.updateInterests', $user->id) }}"
         method="POST"
    >
        @csrf
        @method('PUT')
        <div class="card-header">
            Interests
        </div>

        <div class="card-body">
            @foreach (['Futebol', 'Formula 1'] as $item)
                <div class="form-check">
                    <input 
                        class="form-check-input @error('interests') is-invalid @enderror" 
                        type="checkbox" 
                        value="{{ $item }}"
                        name="interests[][name]"
                        @checked(in_array($item, $user->interests->pluck('name')->toArray()))
                    >
                    <label class="form-check-label" for="checkChecked">
                        {{ $item }}
                    </label>
                </div>

                @if($loop->last)
                    @error('interets')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
            @endforeach
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>
