@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('cities.update', $city) }}">
        @csrf
        @method('PUT')


        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('What State') }}</label>

            <div class="col-md-6">
                <select id="name" class="form-control " name="state_id" value="{{ old('state_id', $city->state->id) }}" 
                    autocomplete="name" autofocus>



                    @forelse ($states as $state)
                        <option value={{ $state->id }} style="color:black"> {{ $state->name }}</option>
                    @empty
                    @endforelse

                </select>

                @error('state_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $city->name) }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>




        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>


            </div>
        </div>
    </form>

    <div class="d-flex">

        <form action="{{ route('cities.destroy', $city) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mr-2">
                Delete this City
            </button>
            
        </form>
        <a href="{{ route('cities.index') }}" class="btn-primary rounded-1 text-decoration-none btn btn-secondary">  Back  </a>
    </div>
@endsection
