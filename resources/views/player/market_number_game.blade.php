@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{$game_name}} -> {{$market}}</div>
                    <!-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif -->
                    <div class="card-body card-block">
                        <form action="{{ route('player.create.game.market') }}" method="POST">
                            @csrf
                            <div class="row">
                                @php if($game_name == "Single" || $game_name == "Triple Patti"){ @endphp
                                    <input type="hidden" name="open_close" value="{{$open_close}}">
                                    @php for($i=0;$i<=9;$i++){ @endphp
                                        <div class="col-lg-3 col-sm-3 col-xs-2 col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        @php
                                                            if($game_name == "Single"){
                                                                echo $i;
                                                            }else if($game_name == "Triple Patti"){
                                                                echo $i.$i.$i;
                                                            }
                                                        @endphp
                                                    </div>

                                                    <input type="number" id="amount" name="amount[{{$i}}]" placeholder="Enter Amount" class="num_disable form-control @error('amount') is-invalid @enderror">
                                                    @error('amount')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @php } @endphp
                                @php } @endphp 

                                @php if($game_name == "Single Patti"){ @endphp
                                    <input type="hidden" name="open_close" value="{{$open_close}}">
                                    @foreach($game_numbers as $row)
                                        <div class="col-lg-3 col-sm-3 col-xs-2 col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        {{ $row->number }}
                                                    </div>
                                                    <input type="number" id="amount" name="amount[{{$row->number}}]" placeholder="Enter Amount" class="num_disable form-control">                                                 
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @php } @endphp  

                                @php if($game_name == "Double Patti"){ @endphp
                                    <input type="hidden" name="open_close" value="{{$open_close}}">
                                    @foreach($game_numbers as $row_double)
                                        <div class="col-lg-3 col-sm-3 col-xs-2 col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        {{ $row_double->number }}
                                                    </div>
                                                    <input type="number" id="amount" name="amount[{{$row_double->number}}]" placeholder="Enter Amount" class="num_disable form-control">                                                 
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @php } @endphp

                                @php if($game_name == "Jodi"){ @endphp
                                    @php for($i=10;$i<=99;$i++){ @endphp
                                        <div class="col-lg-3 col-sm-3 col-xs-2 col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        @php
                                                            if($game_name == "Jodi"){
                                                                echo $i;
                                                            }
                                                        @endphp
                                                    </div>
                                                    <input type="number" id="amount" name="amount[{{$i}}]" placeholder="Enter Amount" class="num_disable form-control">
                                                </div>
                                            </div>
                                        </div>
                                    @php } @endphp
                                    @php for($i=1;$i<=9;$i++){ @endphp
                                        <div class="col-lg-3 col-sm-3 col-xs-2 col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        @php
                                                            if($game_name == "Jodi"){
                                                                echo '0'.$i;
                                                            }
                                                        @endphp
                                                    </div>
                                                    <input type="number" id="amount" name="amount[{{$i}}]" placeholder="Enter Amount" class="num_disable form-control">
                                                </div>
                                            </div>
                                        </div>
                                    @php } @endphp
                                    <div class="col-lg-3 col-sm-3 col-xs-2 col-md-3"> 
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        @php
                                                            if($game_name == "Jodi"){
                                                                echo '0'.'0';
                                                            }
                                                        @endphp
                                                    </div>
                                                    <input type="number" id="amount" name="amount[{{0}}]" placeholder="Enter Amount" class="num_disable form-control">
                                                </div>
                                            </div>
                                        </div>
                                @php } @endphp

                                @php if($game_name == "Half Sangam"){ @endphp
                                    <div class="col col-md-12 form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Radios</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="ank_patti" required= "required" value="Close Ank Open Patti" class="@error('ank_patti') is-invalid @enderror form-check-input ank_patti">Close Ank Open Patti
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="ank_patti" value="Close Patti Open Ank" class="@error('ank_patti') is-invalid @enderror form-check-input ank_patti">Close Patti Open Ank
                                                    </label>
                                                </div>
                                                @error('ank_patti')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col col-md-12 form-group desc">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Ank : </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="ank" id="ank" required= "required" class="@error('ank') is-invalid @enderror form-control">
                                                <option value="">Please select</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                            @error('ank')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-md-12 form-group desc">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Patti : </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="patti" id="patti" required= "required" class="@error('patti') is-invalid @enderror form-control">
                                                <option value="">Please select</option>
                                                @foreach($game_numbers as $row)
                                                    @if($row->patti == 0)
                                                      
                                                            <optgroup label="-----0-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                     
                                                    @elseif($row->patti == 1)
                                                       
                                                            <optgroup label="-----1-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                       
                                                    @elseif($row->patti == 2)
                                                        
                                                            <optgroup label="-----2-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                      
                                                    @elseif($row->patti == 3)
                                                      
                                                            <optgroup label="-----3-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                      
                                                    @elseif($row->patti == 4)
                                                        
                                                            <optgroup label="-----4-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                      
                                                    @elseif($row->patti == 5)
                                                       
                                                            <optgroup label="-----5-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                       
                                                    @elseif($row->patti == 6)
                                                       
                                                            <optgroup label="-----6-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        
                                                    @elseif($row->patti == 7)
                                                      
                                                            <optgroup label="-----7-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                     
                                                    @elseif($row->patti == 8)
                                                       
                                                            <optgroup label="-----8-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                    
                                                    @elseif($row->patti == 9)
                                                        
                                                            <optgroup label="-----9-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                     
                                                    @endif
                                                
                                                @endforeach
                                            </select>
                                            @error('patti')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Amount</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="amount" name="amount" placeholder="Amount" required= "required" class="@error('amount') is-invalid @enderror num_disable form-control">
                                            @error('amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @php } @endphp

                                @php if($game_name == "Full Sangam"){ @endphp
                                    <div class="col col-md-12 form-group desc">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Close Patti : </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="close_patti" id="close_patti" class="@error('close_patti') is-invalid @enderror form-control">
                                                <option value="">Please select</option>
                                                @php $i=0; @endphp
                                                @foreach($game_numbers as $row)
                                                    <option value="{{$row->number}}">{{$i}}</option>
                                                    @if($row->patti == 0)
                                                        @if($i == 0)
                                                            <optgroup label="-----0-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 1)
                                                        @if($i == 0)
                                                            <optgroup label="-----1-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 2)
                                                        @if($i == 0)
                                                            <optgroup label="-----2-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 3)
                                                        @if($i == 0)
                                                            <optgroup label="-----3-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 4)
                                                        @if($i == 0)
                                                            <optgroup label="-----4-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 5)
                                                        @if($i == 0)
                                                            <optgroup label="-----5-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 6)
                                                        @if($i == 0)
                                                            <optgroup label="-----6-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 7)
                                                        @if($i == 0)
                                                            <optgroup label="-----7-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 8)
                                                        @if($i == 0)
                                                            <optgroup label="-----8-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 9)
                                                        @if($i == 0)
                                                            <optgroup label="-----9-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @endif
                                                    $i=$i+1;
                                                @endforeach
                                            </select>
                                            @error('close_patti')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-md-12 form-group desc">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Open Patti : </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="open_patti" id="open_patti" class="@error('open_patti') is-invalid @enderror form-control">
                                                <option value="">Please select</option>
                                                @php $i=0; @endphp
                                                @foreach($game_numbers as $row)
                                                    <option value="{{$row->number}}">{{$i}}</option>
                                                    @if($row->patti == 0)
                                                        @if($i == 0)
                                                            <optgroup label="-----0-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 1)
                                                        @if($i == 0)
                                                            <optgroup label="-----1-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 2)
                                                        @if($i == 0)
                                                            <optgroup label="-----2-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 3)
                                                        @if($i == 0)
                                                            <optgroup label="-----3-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 4)
                                                        @if($i == 0)
                                                            <optgroup label="-----4-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 5)
                                                        @if($i == 0)
                                                            <optgroup label="-----5-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 6)
                                                        @if($i == 0)
                                                            <optgroup label="-----6-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 7)
                                                        @if($i == 0)
                                                            <optgroup label="-----7-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 8)
                                                        @if($i == 0)
                                                            <optgroup label="-----8-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @elseif($row->patti == 9)
                                                        @if($i == 0)
                                                            <optgroup label="-----9-----">
                                                                <option value="{{$row->number}}">{{$row->number}}</option>
                                                            </optgroup>
                                                        @endif
                                                    @endif
                                                    $i=$i+1;
                                                @endforeach
                                            </select>
                                            @error('open_patti')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Amount</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="amount" name="amount" placeholder="Amount" class="@error('amount') is-invalid @enderror num_disable form-control">
                                            @error('amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @php } @endphp
                                <input type="hidden" id="game" name="game" value="{{ $game_name }}" class="form-control">
                                <input type="hidden" id="market" name="market" value="{{ $market }}" class="form-control">
                            </div>
                            <div class="form-actions form-group">
                                <input type="submit" class="btn btn-success btn-sm" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('player.includes.footer')
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // disable alphabets on input field
    $(document).ready(function () {
        $(".num_disable").keypress(function (e) {
            
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)){
                return false;
            }
                
        });
    });
    
</script>



