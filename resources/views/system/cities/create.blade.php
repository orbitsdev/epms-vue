@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('cities.store') }}">
        @csrf


        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('What State') }}</label>

            <div class="col-md-6">
                <select id="name" class="form-control " name="state_id" value="{{ old('state_id') }}" 
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
                    value="{{ old('name',) }}" required autocomplete="name" autofocus>

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
                    {{ __('Save') }}
                </button>


            </div>
        </div>
    </form>
@endsection
