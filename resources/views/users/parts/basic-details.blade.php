<div class="card">
    <form 
        action="{{ route('users.update', $user->id) }}"
         method="POST"
    >
        @csrf
        @method('PUT')
        <div class="card-header">
            Basic data
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="name">Full name</label>
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    name="name"
                    value="{{ old('name') ?? $user->name }}"
                    placeholder="Enter a full name"
                >   
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="email">Email address</label>
                <input 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    name="email"
                    value="{{ old('email') ?? $user->email }}"
                    placeholder="Enter a email address"
                >   
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    name="password"
                    placeholder="Enter a password"
                >   
                @error('password')
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


   

    

    
