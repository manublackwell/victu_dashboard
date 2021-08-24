@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!--stats-->
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media">
                    <div class="media-body text-left w-100">
                      <h3 class="primary">{{ $orders }}</h3>
                      <span>Totale ordini</span>
                    </div>
                    <div class="media-right media-middle">
                      <i class="icon-basket primary font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media">
                    <div class="media-body text-left w-100">
                      <h3 class="success">{{ $users }}</h3>
                      <span>Utenti registrati</span>
                    </div>
                    <div class="media-right media-middle">
                        <i class="icon-user-follow primary font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media">
                    <div class="media-body text-left w-100">
                      <h3 class="warning">{{ $coupons }}</h3>
                      <span>Totale coupon<span>
                    </div>
                    <div class="media-right media-middle">
                      <i class="icon-tag warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/stats-->
      </div>
    </div>
  </div>
@endsection