@extends('backend.layouts.master')
@section('css')
    <link href="{{asset('ui/backend/plugins/datatables/css/jquery.datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('ui/backend/plugins/datatables/css/jquery.datatables_themeroller.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="page-inner">

        <div class="page-title">
            <h3 class="breadcrumb-header">Sales</h3>
        </div>
       <div id="app"> 
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Search item">
                                </div>
                            </div>
                        </div>    
                    </div>    
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <div id="intro">@{{ message }}</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless  mt-1">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Product</th>
                                                    <th width="15%">Price</th>
                                                    <th width="25">Available quantity</th>
                                                    <th width="15%"></th>
                                                </tr>
                                            </thead>
                                            <tr v-for="data in info">
                                                <td>@{{ data.name }}</td>
                                                <td>@{{ data.sellprice }}</td>
                                                <td>@{{ data.quantity }}</td>
                                                <td>
                                                  <button v-on:click.prevent="addproduct(data.id)" class="btn btn-info">Add</button>
                                                </td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        </div>    
                    </div>    
                </div>
                <div class="col-md-6">
                    <div class="panel panel-white basic-form-panel">
                        <div class="panel-body">
                                <form method="POST" action="#" accept-charset="UTF-8" id="scan">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group ">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-barcode "></i></span>
                                                    <input type="text" class="form-control" placeholder="Select item by barcode">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" style="display: none">
                                    </form>
             
                                    <div class="card" id="table-cart">
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <table class="table table-borderless  mt-1">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Product</th>
                                                            <th width="15%">Qty</th>
                                                            <th width="15%">Price</th>
                                                            <th width="25">Total</th>
                                                            <th width="15%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="sale-cart">
                                                        <?php $grandtotal = 0 ?>
                                                        @foreach ($tamps as $tamp)
                                                        <?php $grandtotal += $tamp->sellprice * $tamp->quantity ?>
                                                            <tr>
                                                                <td>{{ $tamp->name }}</td>
                                                                <td>
                                                                    <input type="number" min="1" autocomplete="off" size="3" max="{{ $tamp->maxquantity }}" name="qty" id="qty" value="{{ $tamp->quantity }}" style="text-align:center">
                                                                </td>
                                                                <td>{{ $tamp->sellprice }}</td>
                                                                @php
                                                                    $total=$tamp->quantity*$tamp->sellprice;
                                                                @endphp
                                                                <td>{{ $total }}</td>
                                                                <td>
                                                                    <a href="javascript:void(0)" id="cart-delete" data-id="a21ffd04a22e4dd8522d27e854aa2878" class="btn btn-outline-danger btn-sm "><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
             
                                                <div id="total_count">
                                                    <label for="name" class="col-sm-6 control-label">Grand-Total (Inclusive Tax)</label>
                                                    <div class="col-sm-6 float-right">
                                                            <div class="input-group input-form-groups">
                                                                    <span class="input-group-addon" id="basic-addon1">Tk</span>
                                                                    <input type="text" class="form-control" value="{{ $grandtotal }}" aria-describedby="basic-addon1" readonly>
                                                                </div>
                                                    </div>
                                                    <br> <br>
                                                    <label for="name" class="col-sm-6 control-label">Commercial Tax:</label>
                                                    <div class="col-sm-6 float-right">
                                                            <div class="input-group input-form-groups">
                                                                    <span class="input-group-addon" id="basic-addon1">Tk</span>
                                                                    <input type="text" class="form-control" value="0" aria-describedby="basic-addon1" readonly>
                                                                </div>
                                                    </div>
                                                    <br> <br>
             
                                                    <label for="name" class="col-sm-6 control-label">Paid Amount </label>
                                                    <div class="col-sm-6 float-right">
                                                            <div class="input-group input-form-groups">
                                                                    <span class="input-group-addon" id="basic-addon1">Tk</span>
                                                                    <input type="text" class="form-control" placeholder="Paid amount" aria-describedby="basic-addon1">
                                                                </div>
                                                    </div>
                                                    <br> <br>
                                                    <label for="name" class="col-sm-6 control-label">Return Change:</label>
                                                    <div class="col-sm-6 float-right">
                                                            <div class="input-group input-form-groups">
                                                                    <span class="input-group-addon" id="basic-addon1">Tk</span>
                                                                    <input type="text" class="form-control" value="0" aria-describedby="basic-addon1" readonly>
                                                                </div>
                                                    </div>
             
             
                                                </div>
                                                <br><br><br> 
                                                <br> 
                                                <hr>
                                                <button onclick="return(confirm('Are You Sure to Discard'))" type="submit" class="btn btn-danger btn-min-width ml-2 mb-1 float-left"><i class="fa fa-remove"></i> Discard Sales</button>
                                                <button type="button" id="complete-purchase" class="btn btn-info btn-min-width mr-1 mb-1" style="float: right"><i class="fa fa-money"></i> Complete Sales</button>
             
                                            </div>
                                        </div>
                                    </div>
             
                                
                        </div>    
                    </div>    
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
    </div>
        
    </div><!-- /Page Inner -->

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const url = "http://localhost:8000/stocks";
    const axios = require('axios');
    new Vue({
        el: '#app',
        data : {
            info: null,
            message: 'siam',
        },
        methods : {
            addproduct(id) 
            {
            this.show=id;
            }
        },
        mounted () {
            axios.get('http://localhost:8000/stocks')
                .then(response => (this.info = response.data),console.log(response);)
        }
    });
    // new Vue({
    //         el: '#app',
    //         data: {
    //            message: 'My first VueJS Task'
    //         }
    //      });
</script> 
@endsection