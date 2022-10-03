@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('states.store') }}">
        @csrf


        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('What Country') }}</label>

            <div class="col-md-6">
                <select id="name" class="form-control " name="country_id" value="{{ old('country_id') }}" 
                    autocomplete="name" autofocus>

                    <option value="" style="color:black"> -- Select Country </option>

                    @forelse ($countries as $country)
                        <option value={{ $country->id }} style="color:black"> {{ $country->name }}</option>
                    @empty
                    @endforelse

                </select>

                @error('country_id')
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
