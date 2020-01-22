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
                                    <input type="text" v-model="search" class="form-control" placeholder="Search item">
                                </div>
                            </div>
                        </div>    
                    </div>    
                    <div class="panel panel-white">
                        <div class="panel-body">
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
                                            <tr v-for="data in stocks">
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
                                {{-- <form method="POST" action="#" accept-charset="UTF-8" id="scan">
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
                                    </form> --}}
             
                                    <div class="card" id="table-cart">
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <table class="table table-borderless  mt-1">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Product</th>
                                                            <th width="15%">Price</th>
                                                            <th width="15%">Qty</th>
                                                            <th width="25">Total</th>
                                                            <th width="15%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="sale-cart">
                                                        <tr v-for="data in tamps">
                                                            <td>@{{ data.name }}</td>
                                                            <td>@{{ data.sellprice }}</td>
                                                            <td>
                                                                <input type="number" min="0" v-model="data.quantity" v-on:change="update(data.stockid)" style="width:100%">
                                                            </td>
                                                            <td>
                                                                @{{ data.sellprice*data.quantity }}</td>
                                                            <td>
                                                              <button v-on:click.prevent="removeProduct(data.stockid)" class="btn btn-danger">-</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
             
                                                <div id="total_count">
                                                    <label for="name" class="col-sm-6 control-label">Grand-Total (Inclusive Tax)</label>
                                                    <div class="col-sm-6 float-right">
                                                            <div class="input-group input-form-groups">
                                                                    <span class="input-group-addon" id="basic-addon1">Tk</span>
                                                                    <input type="text" class="form-control" value="" aria-describedby="basic-addon1" readonly>
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
    const url1 = "http://localhost:8000/stocks";
    new Vue({
        el: '#app',
        data : {
            info: [],
            tamps: [],
            search: '',
            stockid: '',
            tempid: '',
            updateQuantity: ''
        },
        methods : {
            addproduct(id) 
            {
                this.stockid=id;
                let url2 = "http://localhost:8000/stock/add/sale/"+id;
                axios.get(url2).then(response => {
                    this.info = response.data.stocks,
                    this.tamps = response.data.tamps
                })
            },
            removeProduct(id) 
            {
                this.tempid=id;
                let url3 = "http://localhost:8000/stock/remove/sale/"+id;
                axios.get(url3).then(response => {
                    this.info = response.data.stocks,
                    this.tamps = response.data.tamps
                })
            },
            update(id) 
            {
                alert(this.updateQuantity);
                let url4 = "http://localhost:8000/stock/update/sale/"+id;
                axios.put(url3).then(response => {
                    this.info = response.data.stocks,
                    this.tamps = response.data.tamps
                })
            }
        },
        mounted () {
            axios.get(url1).then(response => {
                this.info = response.data.stocks,
                this.tamps = response.data.tamps
            })
        },
        computed: {
            stocks() {
            return this.info.filter(data => {
                return data.name.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
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