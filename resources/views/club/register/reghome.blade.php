@extends('club.register.regindex')
@section('content')

	{{-- @include('admin.layouts.messages') --}}
  @yield('content')
  <div id="pageTop">
    @if (!Auth::check())

      @include('club.register.pageParts.mainRegisterAdvice')

    @else
    <!--  -->
      @include('club.register.pageParts.rejectedMessage')
    <!--  -->
    @endif
  </div>
      <div class="row">
        <span class="Loader" style="position:absolute;bottom:50%;left:50%;
              transform:translate(-50%, -20%);
              -ms-transform:translate(-50%, -20%);
              color:white;font-size:16px;border:none;
              cursor:pointer;font-size:10px;color:#3c8dbc;
              z-index: 1;display: none;"
          ><i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
        </span>
          <div id="contentChangable">
            @if (Auth::check())

              @php
                $club = Auth::user();
              @endphp
              @include('club.register.pageParts.editMainRegisterInfo')

            @else

              @include('club.register.pageParts.mainRegisterInfo')
              
            @endif
            
          </div>
          
       </div>

@endsection

@section('page_specific_scripts')
    <!-- flot charts scripts-->
    <script src="{{ url('/') }}/club/js/clubRegister.js"></script>
@stop