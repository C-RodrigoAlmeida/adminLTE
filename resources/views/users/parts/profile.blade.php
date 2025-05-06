<div class="card">
    <form 
        action="{{ route('users.updateProfile', $user->id) }}"
         method="POST"
    >
        @csrf
        @method('PUT')
        <div class="card-header">
            Profile
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="name">Type of contract</label>
                <select 
                    name="type"
                    class="form-control @error('type') is-invalid @enderror"
                >
                    @foreach (['PJ', 'PF'] as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                        @selected(old('type') === $type || $user?->profile?->type)
                    @endforeach
                </select>
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="address">Address</label>
                <input 
                    type="address" 
                    class="form-control @error('address') is-invalid @enderror" 
                    name="address"
                    value="{{ old('address') ?? $user?->profile?->address }}"
                    placeholder="Enter a email address"
                >   
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>
