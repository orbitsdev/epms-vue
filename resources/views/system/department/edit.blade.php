@extends('layouts.main')

@section('content')

<form method="POST" action="{{route('departments.update', $department)  }}">
    @csrf
    @method('PUT')

    

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Department Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $department->name) }}" required autocomplete="name" autofocus>

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
        
    <form action="{{ route('departments.destroy', $department) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mr-2">
            Delete this Department
        </button>
        
    </form>
    <a href="{{ route('departments.index') }}" class="btn-primary rounded-1 text-decoration-none btn btn-secondary">  Back  </a>
</div>

@endsection