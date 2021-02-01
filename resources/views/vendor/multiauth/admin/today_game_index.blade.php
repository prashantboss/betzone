@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="main-content-inner">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Watch Today Game</h4>
                @php $game_id_with_oc = array(1,2,3,4,5); @endphp
                @if(in_array($game_id,$game_id_with_oc))
                    <form action = "{{route('admin.today_game_search')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="game_id" value="{{$game_id}}">
                        <div class="form-row align-items-center">
                            <div class="col-sm-2 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input class="form-control" name ="date" type="date" value="{{date('Y-m-d')}}" id="example-date-input">
                            </div>
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Markets</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">M</div>
                                    </div>
                                    <select name="market_id" class="custom-select">
                                        <option value=''>select market</option>
                                        @foreach($markets as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            @if($game_id != 2)
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Open Close</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">oc</div>
                                    </div>
                                    <select name="oc" class="custom-select">
                                        <option value=''>select open/close</option>
                                        <option value="open">Open</option>
                                        <option value="close">Close</option>
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">n</div>
                                    </div>
                                    <select name="number" class="custom-select">
                                        <option value=''>select number</option>
                                        @if($game_name == "Single" || $game_name == "Triple Patti")
                                            @php for($i=0;$i<=9;$i++){ @endphp
                                                @if($game_name == "Single")
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @elseif($game_name == "Triple Patti")
                                                    <option value="{{$i.$i.$i}}">{{$i.$i.$i}}</option>
                                                @endif
                                                
                                            @php } @endphp
                                        @elseif($game_name == "Single Patti")
                                            @php $game_numbers = DB::table('game_number')->where('game', 'single_patti')->get(); @endphp
                                            @foreach($game_numbers as $row)
                                                <option value="{{ $row->number }}">{{ $row->number }}</option>
                                            @endforeach
                                        @elseif($game_name == "Double Patti")
                                            @php $game_numbers = DB::table('game_number')->where('game', 'double_patti')->get(); @endphp
                                            @foreach($game_numbers as $row_double)
                                                <option value="{{ $row_double->number }}">{{ $row_double->number }}</option>
                                            @endforeach
                                        @elseif($game_name == "Jodi")
                                            @php for($i=10;$i<=99;$i++){ @endphp
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @php } @endphp
                                            @php for($i=1;$i<=9;$i++){ @endphp
                                                <option value="{{ '0'.$i }}">{{ '0'.$i }}</option>
                                            @php } @endphp
                                            <option value="{{ '0'.'0' }}">{{ '0'.'0' }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif


                @if($game_id==6)
                <form action = "{{route('admin.today_game_search')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="game_id" value="{{$game_id}}">
                        <div class="form-row align-items-center">
                            <div class="col-sm-2 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input class="form-control" name ="date" type="date" value="{{date('Y-m-d')}}" id="example-date-input">
                            </div>
                            <div class="col-sm-2 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Markets</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">M</div>
                                    </div>
                                    <select name="market_id" class="custom-select">
                                        <option value=''>select market</option>
                                        @foreach($markets as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-2 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Open Close</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">OC</div>
                                    </div>
                                    <select name="oc" class="custom-select">
                                        <option value=''>select open/close</option>
                                        <option value="Close Ank Open Patti">Close Ank Open Patti</option>
                                        <option value="Close Patti Open Ank">Close Patti Open Ank</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-2 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Ank</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Ank</div>
                                    </div>
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
                                </div>
                            </div>

                            <div class="col-sm-2 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Patti</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Patti</div>
                                    </div>
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
                                </div>
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif

                @if($game_id==7)
                <form action = "{{route('admin.today_game_search')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="game_id" value="{{$game_id}}">
                        <div class="form-row align-items-center">
                            <div class="col-sm-2 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input class="form-control" name ="date" type="date" value="{{date('Y-m-d')}}" id="example-date-input">
                            </div>
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Markets</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">M</div>
                                    </div>
                                    <select name="market_id" class="custom-select">
                                        <option value=''>select market</option>
                                        @foreach($markets as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                          
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Close Patti</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">CP</div>
                                    </div>
                                    <select name="close_patti" id="close_patti" class="@error('close_patti') is-invalid @enderror form-control">
                                        <option value="">Please select</option>
                                        @php $i=0; @endphp
                                        @foreach($game_numbers as $row)
                                            <!-- <option value="{{$row->number}}">{{$i}}</option> -->
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
                                </div>
                            </div>
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Open Patti</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">OP</div>
                                    </div>
                                    <select name="open_patti" id="open_patti" class="@error('open_patti') is-invalid @enderror form-control">
                                        <option value="">Please select</option>
                                        @php $i=0; @endphp
                                        @foreach($game_numbers as $row)
                                            <!-- <option value="{{$row->number}}">{{$i}}</option> -->
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
                                </div>
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@include('multiauth::includes.footer')
@endsection