<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('layouts.admin.style')
    

</head>

<body id="page-top">
    



    <div id="wrapper">

        @include('layouts.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content pink-900">
                
            
                @include('layouts.admin.header')
                <div class="container-fluid " style="height: 1vh: background:red">
                   
                    @yield('content')
                      
                   {{--  @include('layouts.admin.cards.cards')  --}}                   
                   {{--  @include('layouts.admin.cards.chart')  --}}                        
                   {{--  @include('layouts.admin.cards.project')  --}}
                  
                    
                    

                </div>

            </div>

           {{--  @include('layouts.admin.footer')  --}}

        </div>
    </div>
    
    @include('layouts.admin.modal.modal')
    @include('layouts.admin.scripts')
    
  

</body>

</html>