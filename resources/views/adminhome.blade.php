@extends('backlayouts.master')
@section('title','Home')
@section('active','mm-active')
@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate">
                    </i>
                </div>
                <div>Dashboard Home
                    <div class="page-title-subheading">Admin can manage categories,items and orders.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
            </div>    
        </div>
    </div>
    <div class="">
        <div class="row">
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Category</div>
                            <div class="widget-subheading">Last update result</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"><span>{{$cat}}</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Items</div>
                            <div class="widget-subheading">Last update result</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"><span>{{$item}}</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Order</div>
                            <div class="widget-subheading">Last update results</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"><span>{{$order}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Clients</div>
                            <div class="widget-subheading">Total Clients Profit</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-primary"><span>$ 568</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Products Sold</div>
                            <div class="widget-subheading">Total revenue streams</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><span>$14M</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Followers</div>
                            <div class="widget-subheading">People Interested</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger"><span>46%</span></div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>


@endsection