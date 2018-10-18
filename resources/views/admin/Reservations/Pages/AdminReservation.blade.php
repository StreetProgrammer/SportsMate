@extends('admin.index')
@section('content')

<!------ start Profile Content---------->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ trans('admin.reservationInfo') }}
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Event</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Sport Mate.
            <small class="pull-right">{{ trans('admin.date') }} : {{ $Reservation->created_at }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          {{ trans('admin.from') }}
            @php 
              //$is_ownerClub = ($Reservation->ReservationCreator->id == $Reservation->ReservedClub->id) ? 'clubs' : 'players';
              $is_owner = ($is_ownerClub == 'clubs') ? 'Owner' : '';
            @endphp
              @if ($is_ownerClub == 'clubs')
                <address>
                  <strong>
                    <a href="{{ aurl() }}/{{$is_ownerClub}}/{{$Reservation->ReservationCreator->id}}">
                      {{ $ResOwner->name }} 
                    </a>
                    {{ $is_owner }}
                  </strong>
                  <p>{{$ResOwner->email}}</p>
                  <p>
                    {{$ResOwner->clubProfile->country->c_en_name}},
                    {{$ResOwner->clubProfile->governorate->g_en_name}}
                    {{$ResOwner->clubProfile->area->a_en_name}}
                  </p>
                  <p>{{$ResOwner->clubProfile->c_phone}}</p>
                </address>
              @else
                <address>
                  <strong>
                    <a href="{{ aurl() }}/{{$is_ownerClub}}/{{$ResOwner->id}}">
                      {{ $ResOwner->name }}
                    </a>
                  </strong>
                  <p>{{$ResOwner->email}}</p>
                  <p>
                    {{$ResOwner->playerProfile->country->c_en_name}},
                    {{$ResOwner->playerProfile->governorate->g_en_name}}
                    {{$ResOwner->playerProfile->area->a_en_name}}
                  </p>
                  <p>{{$ResOwner->playerProfile->p_phone}}</p>
                </address>
              @endif        
         
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          {{ trans('admin.to') }}
          <address>
              <strong>
                <a href="{{ aurl() }}/clubs/{{$Reservation->ReservedClub->id}}">
                  {{ $Reservation->ReservedClub->name }} 
                </a>
              </strong>
              <p>{{$Reservation->ReservedClub->email}}</p>
              <p>
                {{$Reservation->ReservedClub->clubProfile->country->c_en_name}},
                {{$Reservation->ReservedClub->clubProfile->governorate->g_en_name}}
                {{$Reservation->ReservedClub->clubProfile->area->a_en_name}}
              </p>
              <p>{{$Reservation->ReservedClub->clubProfile->c_phone}}</p>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>{{ trans('admin.moreInfo') }}</b><br>
          <br>
          <b>{{ trans('admin.reservationdID') }} :</b> {{$Reservation->id}}<br>
          <b>{{ trans('admin.playground') }} : </b><a href="">{{$Reservation->ReservedPlayground->c_b_p_name}}</a><br>
          <b>{{ trans('admin.hourCount') }}:</b> {{$Reservation->R_hour_count}}<br>
          <b>{{ trans('admin.dateday') }} : </b> {{$Reservation->R_date}} {{$Reservation->ReservationDay->day_format}}<br>
          <b>{{ trans('admin.interval') }} :</b> {{ trans('admin.from') }} {{$Reservation->ReservationFrom->hour_format}} {{ trans('admin.to') }} {{$Reservation->ReservationTo->hour_format}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
     <!--  <div class="row">
       <div class="col-xs-12 table-responsive">
         <table class="table table-striped">
           <thead>
           <tr>
             <th>Qty</th>
             <th>Product</th>
             <th>Serial #</th>
             <th>Description</th>
             <th>Subtotal</th>
           </tr>
           </thead>
           <tbody>
           <tr>
             <td>2</td>
             <td>Call of Duty</td>
             <td>455-981-221</td>
             <td>El snort testosterone trophy driving gloves handsome</td>
             <td>$64.50</td>
           </tr>
           <tr>
             <td>1</td>
             <td>Need for Speed IV</td>
             <td>247-925-726</td>
             <td>Wes Anderson umami biodiesel</td>
             <td>$50.00</td>
           </tr>
           <tr>
             <td>1</td>
             <td>Monsters DVD</td>
             <td>735-845-642</td>
             <td>Terry Richardson helvetica tousled street art master</td>
             <td>$10.70</td>
           </tr>
           <tr>
             <td>1</td>
             <td>Grown Ups Blue Ray</td>
             <td>422-568-642</td>
             <td>Tousled lomo letterpress</td>
             <td>$25.99</td>
           </tr>
           </tbody>
         </table>
       </div>
       /.col
     </div>
     /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="{{ url('design/AdminLTE') }}/dist/img/credit/visa.png" alt="Visa">
          <img src="{{ url('design/AdminLTE') }}/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="{{ url('design/AdminLTE') }}/dist/img/credit/american-express.png" alt="American Express">
          <img src="{{ url('design/AdminLTE') }}/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">{{ trans('admin.ReservationCostDetails') }}</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">{{ trans('admin.hourCount') }} :</th>
                <td>{{ $Reservation->R_hour_count }}</td>
              </tr>
              <tr>
                <th>{{ trans('admin.hourPrice') }} :</th>
                <td>{{ $Reservation->R_price_per_hour }}</td>
              </tr>
              <tr>
                <th>{{ trans('admin.total') }} :</th>
                <td>{{ $Reservation->R_total_price }}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <!-- <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div> -->
    </section>
    <!-- /.content -->
  <!------ End Profile Content ------------->

@endsection
