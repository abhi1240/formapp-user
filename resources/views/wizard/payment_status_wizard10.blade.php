@extends('layouts.app')
@section('content')
<div class="contents">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="shop-breadcrumb">
               <div class="breadcrumb-main">
                  <h4 class="text-capitalize breadcrumb-title">checkout</h4>
                  <div class="breadcrumb-action justify-content-center flex-wrap">
                     <div class="action-btn">
                        <div class="form-group mb-0">
                           <div class="input-container icon-left position-relative">
                              <span class="input-icon icon-left">
                              <span data-feather="calendar"></span>
                              </span>
                              <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                              <span class="input-icon icon-right">
                              <span data-feather="chevron-down"></span>
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="dropdown action-btn">
                        <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                           <span class="dropdown-item">Export With</span>
                           <div class="dropdown-divider"></div>
                           <a href="" class="dropdown-item">
                           <i class="la la-print"></i> Printer</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-file-pdf"></i> PDF</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-file-text"></i> Google Sheets</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-file-excel"></i> Excel (XLSX)</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-file-csv"></i> CSV</a>
                        </div>
                     </div>
                     <div class="dropdown action-btn">
                        <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-share"></i> Share
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                           <span class="dropdown-item">Share Link</span>
                           <div class="dropdown-divider"></div>
                           <a href="" class="dropdown-item">
                           <i class="la la-facebook"></i> Facebook</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-twitter"></i> Twitter</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-google"></i> Google</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-feed"></i> Feed</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-instagram"></i> Instagram</a>
                        </div>
                     </div>
                     <div class="action-btn">
                        <a href="" class="btn btn-sm btn-primary btn-add">
                        <i class="la la-plus"></i> Add New</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class=" global-shadow wizard7 checkout-review border py-30 px-sm-50 px-30 bg-white radius-xl w-100 mb-30">
         <div class="row justify-content-center">
            <div class="cus-8 col-12">
               <div class="checkout-progress-indicator content-center">
                  <div class="checkout-progress w-100 justify-content-center">
                     <div class="step completed" id="1">
                        <span class="las la-check fs-18"></span>
                        <span>Create Account</span>
                     </div>
                     <div class="current"><img src="{{ asset('img/svg/green.svg') }}" alt="img" class="svg"></div>
                     <div class="step completed" id="2">
                        <span class="las la-check fs-18"></span>
                        <span>Shipping Address</span>
                     </div>
                     <div class="current"><img src="{{ asset('img/svg/green.svg') }}" alt="img" class="svg"></div>
                     <div class="step completed" id="3">
                        <span class="las la-check fs-18"></span>
                        <span>Payment Method</span>
                     </div>
                     <div class="current"><img src="{{ asset('img/svg/green.svg') }}" alt="img" class="svg"></div>
                     <div class="step completed" id="4">
                        <span class="las la-check fs-18"></span>
                        <span>Review Order</span>
                     </div>
                  </div>
                  <!-- End: .checkout-progress -->
               </div>
               <!-- End: .checkout-progress-indicator -->
               <div class="card payment-status bg-normal p-sm-30 p-15">
                  <div class="card-body bg-white bg-shadow radius-xl px-sm-30 py-sm-25 m-0 px-15 py-1">
                     <div class="payment-status__area  py-sm-25 py-20 text-center">
                        <div class="content-center">
                           <span class="wh-34 bg-success rounded-circle content-center">
                           <span class="las la-check fs-16 color-white"></span></span>
                        </div>
                        <h4 class="fw-500 mt-20 mb-10">Payment Successful</h4>
                        <span class="fs-15 color-gray">Thank you! We've received your payment.</span>
                     </div>
                  </div>
               </div>
               <!-- End: .card -->
            </div>
            <!-- End: .col-lg-10 -->
         </div>
      </div>
      <!-- End: .checkout-review -->
   </div>
</div>
@endsection