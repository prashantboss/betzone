@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Profile Edit</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Profile Edit</h3>
                            </div>
                            <hr>
                            <form action="{{ route('player.update') }}" method="get">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Your Name</label>
                                            <input id="name" name="name" type="text" class="@error('name') is-invalid @enderror num_disable form-control" placeholder="Please enter your name" required="required" value="{{Auth::guard('player')->user()->name}}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group has-success">
                                            <label for="username" class="control-label mb-1">Username</label>
                                            <input id="username" value="{{Auth::guard('player')->user()->username}}" name="username" type="text" placeholder="Please enter username" class="@error('username') is-invalid @enderror num_disable form-control" required="required">
                                            @error('username')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">Email</label>
                                            <input id="email" name="email" type="email" placeholder="Please enter email" class="@error('email') is-invalid @enderror num_disable form-control email identified visa" value="{{Auth::guard('player')->user()->email}}" required="required">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="mobile" class="control-label mb-1">Mobile</label>
                                            <input id="mobile" name="mobile" type="tel" class="@error('mobile') is-invalid @enderror num_disable form-control mobile" value="{{Auth::guard('player')->user()->mobile}}" placeholder="Please enter mobile" required="required">
                                            @error('mobile')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="x_card_code" class="control-label mb-1">Account Details</label>
                                    <div class="input-group">
                                        <select name="account_detail" id="account_detail" class="@error('account_detail') is-invalid @enderror num_disable form-control" required="required">
                                            <option {{Auth::guard('player')->user()->account_detail==null? 'selected':''}} value="">Please select</option>
                                            <option {{Auth::guard('player')->user()->account_detail=="PhonePay"? 'selected':''}} value="PhonePay">PhonePay</option>
                                            <option {{Auth::guard('player')->user()->account_detail=="Gpay"? 'selected':''}} value="Gpay">Gpay</option>
                                            <option {{Auth::guard('player')->user()->account_detail=="PayTm"? 'selected':''}} value="PayTm">PayTm</option>
                                            <option {{Auth::guard('player')->user()->account_detail=="Bank"? 'selected':''}} value="Bank">Bank</option>
                                        </select>
                                        @error('account_detail')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row" id="account_detail_extra" style="border: 2px solid black;margin-bottom: 1rem;">
                                    <div class="col-12"><p>Bank Details</p></div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="bank_name " class="control-label mb-1">Bank Name </label>
                                            <input id="bank_name" name="bank_name" type="tel" class="form-control bank_name " value="{{Auth::guard('player')->user()->bank_name}}" placeholder="Please enter bank name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="bank_ifsc" class="control-label mb-1">bank IFSC</label>
                                            <input id="bank_ifsc" name="bank_ifsc" type="tel" class="form-control bank_ifsc" value="{{Auth::guard('player')->user()->bank_ifsc}}" placeholder="Please enter bank IFSC">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="bank_holder_name" class="control-label mb-1">Bank Holder Name</label>
                                            <input id="bank_holder_name" name="bank_holder_name" type="tel" class="form-control bank_holder_name" value="{{Auth::guard('player')->user()->bank_holder_name}}" placeholder="Bank Holder Name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="account_number" class="control-label mb-1">Account Number</label>
                                            <input id="account_number" name="account_number" type="tel" class="form-control account_number" value="{{Auth::guard('player')->user()->account_number}}" placeholder="Please enter account number">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info ">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Update</span>
                                        <span id="payment-button-sending" style="display:none;">Updating</span>
                                    </button>
                                </div>
                            </form>
                        </div>
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
    $(document).ready(function () {
    toggleFields(); // call this first so we start out with the correct visibility depending on the selected form values
    // this will call our toggleFields function every time the selection value of our other field changes
    $("#account_detail").change(function () {
        toggleFields();
    });

});
// this toggles the visibility of other server
function toggleFields() {
    if ($("#account_detail").val() === "Bank")
        $("#account_detail_extra").show();
    else
        $("#account_detail_extra").hide();
}
    
</script>