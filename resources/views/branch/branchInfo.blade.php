@extends('branch.layouts.branchlayout')

@section('content')



<div class="container" style="font-size:80%">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default shade" style="">
                <div class="panel-heading" style="">
                  <h4><span style="color:#FF5522;font-style:italic;">{{ $clubBranche->c_b_name }}</span> Page
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                      <span style="color:#FF5522;">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                      </span>
                    </a>
                  </h4>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group">
                        <li class="list-group-item">Name : 
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $clubBranche->c_b_name }}
                            </span>
                        </li>
                        
                        <li class="list-group-item">Phone: 
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $clubBranche->c_b_phone }}
                            </span>
                        </li>

                        <li class="list-group-item">Address: 
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $clubBranche->c_b_address }}
                            </span>
                        </li>
                        <li class="list-group-item">Description: 
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $clubBranche->c_b_desc }}
                            </span>
                        </li>
                    </ul>
                </div>
                <div id="collapse1" class="panel panel-collapse collapse shade" 
                                    style=" margin: 30px;
                                            border:1px solid #ff5522;
                                            color:#ff5522;"  
                >

                <div class="panel-heading" style="">
                  <h4>Add New Playground</h4>
                </div>
                <div class="panel-body">
                {{--------------------- Add branch From  ----------------------}}
                 <form method="POST" action="{{url('NewBranch')}}">

                  {{ csrf_field() }}

                  <div class="form-group-sm">
                    <label for="c_b_name">Branch Name : </label>
                    <input type="text" class="form-control" name="c_b_name" id="c_b_name">
                  </div>
                   <div class="form-group-sm">
                    <label for="c_b_phone">Branch Phone : </label>
                    <input type="text" class="form-control" name="c_b_phone" id="c_b_phone">
                  </div>
                  <div class="form-group-sm">
                    <label for="c_b_address">Branch Address : </label>
                    <input type="text" class="form-control" name="c_b_address" id="c_b_address">
                  </div>
                  <div class="form-group-sm">
                    <label for="c_b_desc">Description : </label>
                    <input type="text" class="form-control" name="c_b_desc" id="c_b_desc">
                  </div>
                  <br>
                  <input type="submit" name="add" value="Add" class="btn btn-success btn-xs"> 

                </form>

                </div>
              </div>
            </div>

        </div>

        

        <div class="col-md-6">
          <div class="panel panel-default shade" style="">

            <div class="panel-heading" style="">

              <h4 style="color:#FF5522;font-style:italic;">
                <span >
                  Playgrounds
                </span> 
                <span class="pull-right">
                  {{$clubBranche->branchPlaygrounds->count()}}
                </span>
              </h4>


            </div>

            <div class="panel-body">

              <ul class="list-group">
                @foreach ($clubBranche->branchPlaygrounds as $playground)
                  <li class="list-group-item">Name :
                    <div>
                      <span style="color:#FF5522;font-weight:bold;">
                        {{ $clubBranche->c_b_name }}
                      </span>
                    </div>
                    @if ($playground->playgroundEvents->count() == 0)
                      No Event For This Playground Till Now
                    @else
                      @foreach ($playground->playgroundEvents as $Event)
                        1
                      @endforeach
                    @endif 
                  </li>
                @endforeach
              </ul>

              @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif

            </div>


          </div>
        </div>


        <div class="col-md-6">
          <div class="panel panel-default shade" style="">

            <div class="panel-heading" style="">

              <h4 style="color:#FF5522;font-style:italic;">
                <span >
                  Playgrounds
                </span> 
                <span class="pull-right">
                  {{$clubBranche->branchPlaygrounds->count()}}
                </span>
              </h4>


            </div>

            <div class="panel-body">

              <ul class="list-group">
                @foreach ($clubBranche->branchPlaygrounds as $playground)
                  <li class="list-group-item">Name :
                    <div>
                      <span style="color:#FF5522;font-weight:bold;">
                        {{ $clubBranche->c_b_name }}
                      </span>
                    </div> 
                  </li>
                @endforeach
              </ul>

              @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif

            </div>


          </div>
        </div>

        
    </div>
</div>

@endsection
