


@extends('layouts.main')


@section('content')

<div class=" ">
    <h1 class="h3 mb-0 text-gray-800 mr-4 mb-2"> List of Cities</h1>
    
</div>

    <div class="">
      <div class="text-center mb-4">

        <form method="GET" action="{{ route('cities.index') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
              <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..."
                  aria-label="Search" aria-describedby="basic-addon2" name="search">
              <div class="input-group-append">
                  <button  type="submit" class="btn btn-primary" >
                      <i class="fas fa-search fa-sm"></i>
                  </button>
              </div>
          </div>
      </form>
      </div>
        <div class="card mx-auto">
        <div class="card-header ">
            <a href="{{ route('cities.create') }}" class="float-right btn-primary rounded-1 text-decoration-none py-1 px-2"> <i class="fa-solid fa-plus"></i> Create State  </a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-borderless  ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">State Name</th>
                    <th scope="col">City Name</th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>

                  @forelse ($cities as $key=> $city)
                  <tr>
                    <td scope="row">{{  $key=$key+1 }}</td>
                    <td>{{ $city->state->name }}</td>
                    <td>{{$city->name }}</td>
                   <td class=> 
                    <div class="d-flex">
                      <a href="{{ route('cities.edit', $city) }}" class="text-decoration-none ">
                        <i class=" fa-regular fa-pen-to-square "></i>
                      </a>
          

                                
                            <form method="POST" action={{  route('cities.destroy', $city)}}>
                              @csrf
                              @method('DELETE')
                              <button type="submit"  class="border-0  bg-transparent  text-red-500" style="color: red">
                                
                                <i class=" mx-2 fa-solid fa-xmark"></i>
                              </button>
                              
                            </form>

                    
                      </div> 
                   </td>
                  </tr>

                  @empty
                    
                  @endforelse
                  
                </tbody>
              </table>

              {!! $cities->links() !!}
        </div>

        </div>
    </div>
@endsection   
    