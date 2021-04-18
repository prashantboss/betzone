@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')

<style>
blink {
  -webkit-animation: 2s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
  animation: 2s linear infinite condemned_blink_effect;
}

/* for Safari 4.0 - 8.0 */
@-webkit-keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

@keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}
</style>

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header" style="margin: auto;">
                        <strong style="color:red;font-style: italic;"><blink>Download Our App</blink></strong><br/>
                    </div>
                    <div class="card-body" style="background: black;">
                        <a href="{{asset('/')}}download/betzone.apk" class="btn btn-outline-warning btn-lg btn-block">Download</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-block d-sm-none">
                <div class="card">
                    <div class="card-body">
                        <a target="_blank" href="https://wa.me/{{$siteSetting['site_phone_primary']}}?text=Sir I want to deposite money" type="button" class="btn btn-success btn-lg active">Deposite</a>
                        <a target="_blank" href="https://wa.me/{{$siteSetting['site_phone_primary']}}?text=Sir I want to withdrawl money" style="float:right" type="button" class="btn btn-success btn-lg">Withdrawl</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-none d-sm-block d-sm-none d-md-block">
                <div class="card">
                    <div class="card-body">
                        <a target="_blank" href="https://wa.me/{{$siteSetting['site_phone_primary']}}?text=Sir I want to deposite money" type="button" class="btn btn-outline-success btn-lg btn-block">Deposite</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-none d-sm-block d-sm-none d-md-block">
                <div class="card">
                    <div class="card-body">
                        <a target="_blank" href="https://wa.me/{{$siteSetting['site_phone_primary']}}?text=Sir I want to withdrawl money" class="btn btn-outline-danger btn-lg btn-block">Withdrawl</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="margin: auto;">
                        <strong>Games</strong>
                    </div>
                    <div class="card-body" style="background: black;">
                        @foreach($game as $row)
                            <a class="btn btn-outline-warning btn-lg btn-block" href="{{ route('player.list.market', ['id' => $row->id, 'name' => $row->game_name])}}">{{ $row->game_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="margin: auto;">
                        <strong>Live Result </strong>
                        <!-- <small>Use this class
                            <code>.btn-block</code>
                        </small> -->
                    </div>
                    <div class="card-body" style="background: black;">
                        @foreach($live_result as $row)
                            <button type="button" class="btn btn-outline-warning btn-lg btn-block">
                            {{$row->name}}<br/>
                            @if($row->open =="")  
                                {{"XXX"}}       
                            @else
                                {{$row->open}}      
                            @endif

                            @if($row->jodi =="")  
                                {{"-XX-"}}       
                            @elseif(strlen((string)$row->jodi) == "1")
                                {{"-".$row->jodi."X-"}}      
                            @else
                                {{"-".$row->jodi."-"}}
                            @endif

                            @if($row->close =="")  
                                {{"XXX"}}       
                            @else
                                {{$row->close}}      
                            @endif
                            <br/>
                            @php 
                            $date_open = new DateTime(date("Y-m-d")." ".$row->open_time); 
                            $date_close = new DateTime(date("Y-m-d")." ".$row->close_time); 
                            @endphp
                            {{$date_open->format('h:ia')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$date_close->format('h:ia')}}
                            </button>


                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('player.includes.footer')

@endsection
@push('scripts')
    <script>
        alert("OK");
    </script>
@endpush


