@extends('layouts.app')

@section('content')
<!-- / main menu-->
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">STATISTICHE</h3>
        <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">STATISTICHE
                </li>
            </ol>
        </div>
        </div>
    </div>
</div>
<!--// Creation body start-->
<div class="content-body">
    <!--Create data table start-->
    <div class="content-body">
        <section id="multi-column">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">ORDINI</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="card-body chartjs" style="height: 500px;"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="line-chart" height="916" width="2084" style="display: block; width: 1042px; height: 458px;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
    <!--Create data table end-->
</div>
<!--// Creation body end-->

@include('modals.shipping-txt-modal')

@endsection

