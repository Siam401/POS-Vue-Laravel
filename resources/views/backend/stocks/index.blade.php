@extends('backend.layouts.master')
@section('css')
    <link href="{{asset('ui/backend/plugins/datatables/css/jquery.datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('ui/backend/plugins/datatables/css/jquery.datatables_themeroller.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="page-inner">

        <div class="page-title">
            <h3 class="breadcrumb-header">Stocks</h3>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-body">
                            @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                            @endif
                            <div class="table-responsive">
                                    <table id="example" class="display table table-data-width">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Get Price</th>
                                                    <th>Sell Price</th>
                                                    <th>Quantity</th>
                                                    <th>Categoryid</th>
                                                    <th>Companyid</th>
                                                    <th>Barcode</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Get Price</th>
                                                    <th>Sell Price</th>
                                                    <th>Quantity</th>
                                                    <th>Categoryid</th>
                                                    <th>Companyid</th>
                                                    <th>Barcode</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($stocks as $stock)
                                                    <tr>
                                                        <td>{{ $stock->name }}</td>
                                                        <td>{{ $stock->getprice }}</td>
                                                        <td>{{ $stock->sellprice }}</td>
                                                        <td>{{ $stock->quantity }}</td>
                                                        <td>{{ $stock->categoryid }}</td>
                                                        <td>{{ $stock->companyid }}</td>
                                                        <td>{{ $stock->barcode }}</td>
                                                        <td>
                                                        <a href="#" type="button" class="btn btn-info btn-rounded">Update</a>
                                                        <button type="submit" class="btn btn-danger btn-rounded">Delete</button>   
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                           </table>  
                                           </table>  
                            </div>    
                        </div>    
                    </div>    
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->

        
    </div><!-- /Page Inner -->

@endsection

@section('script')
<script src="{{asset('ui/backend/plugins/datatables/js/jquery.datatables.min.js')}}"></script>    
<script src="{{asset('ui/backend/js/pages/table-data.js')}}"></script>    
@endsection