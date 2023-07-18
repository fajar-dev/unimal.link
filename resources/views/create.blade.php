@extends('layouts.app')

@section('content')

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div id="kt_app_toolbar" class="app-toolbar py-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
            <div class="d-flex flex-column flex-row-fluid">
                <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                    <div class="page-title d-flex align-items-center me-3">
                        <img alt="Logo" src="{{ asset('assets/media/svg/misc/layer.svg') }}" class=" h-200px h-lg-450px me-5" />
                    </div>
                    <div class="d-flex gap-4 gap-lg-13">
                        <div class="d-flex flex-column">
                            <h1 class="text-white fw-bold fs-1 fs-5hx mb-1">Buat setiap koneksi berarti</h1>
                            <div class="text-white opacity-50 fw-bold fs-2">Buat tautan pendek, Kode QR, dan halaman Link di bio.
                                Bagikan di mana saja. Lacak apa yang berhasil, dan apa yang tidak.
                                Semua di dalam Platform Unimal Link.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-container container-xxl">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">
                <div id="kt_app_content" class="app-content rounded-2">
                    <div class="row gx-5 gx-xl-10">
                        <div class="col-xl-12 mb-5 mb-xl-10">
                            <div class="card  card-flush h-xl-100">
                                <div class="card-header pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-1 text-gray-800">Perpendek Tautan</span>
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Tautan khusus untuk Anda</span>
                                    </h3>
                                </div>
                                <div class="card-body py-3">
                                    @if(session()->has('url'))
                                        <div class="alert alert-success">
                                            Here you go- <a id="hash-link" target="_blank" href="{{ session()->get('url') }}">{{ session()->get('url') }}</a>
                                        </div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <form method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('link')}}">
                                        @csrf
                                        <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Tautan</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's company name (optional)." data-bs-original-title="Enter the contact's company name (optional)." data-kt-initialized="1">
                                                                <i class="ki-outline ki-information fs-7"></i>                    
                                                        </span>
                                                </label>
                                                <input type="url" class="form-control form-control-lg form-control-solid  @error('url') is-invalid @enderror" value="{{ old('url') }}" placeholder="Long URL goes here..." name="url" autocomplete="off">
                                                @error('url')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                <div class="col">
                                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                                        <span>Domain</span>
                                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's email." data-bs-original-title="Enter the contact's email." data-kt-initialized="1">
                                                                                <i class="ki-outline ki-information fs-7"></i>                            
                                                                        </span>
                                                                </label>
                                                                <input type="url" class="form-control form-control-lg form-control-solid" name="email" value="unimal.link/" disabled fdprocessedid="msitol">
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>								
                                                </div>
                                                <div class="col">
                                                        <div class="fv-row mb-7">
                                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                                        <span>Tautan Khusus</span>
                                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's phone number (optional)." data-bs-original-title="Enter the contact's phone number (optional)." data-kt-initialized="1">
                                                                                <i class="ki-outline ki-information fs-7"></i>                            
                                                                        </span>
                                                                </label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid @error('hash') is-invalid @enderror" name="hash" value="{{ old('hash') }}""  placeholder="Put your custom hash name (Optional)" autocomplete="off">
                                                                @error('hash')
                                                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="d-flex justify-content-start">
                                            @guest
                                                <a href="" class="btn btn-primary btn-lg">
                                                    <span class="indicator-label">
                                                            Masuk Dulu
                                                    </span>
                                                </a>  
                                                @else
                                                <button type="submit"  class="btn btn-primary btn-lg" >
                                                    <span class="indicator-label">
                                                            Perpendek Tautan
                                                    </span>
                                                    <span class="indicator-progress">
                                                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>     
                                            @endguest
                                                
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div id="kt_app_toolbar" class="app-container bg-body py-20">
        <div id="kt_app_toolbar_container" class="app-container container">
            <div class="card" id="kt_pricing">     
                <div class="card-body p-lg-17">
                        <div class="d-flex flex-column">
                                <div class="mb-13 text-center">
                                        <h1 class="fs-2hx fw-bold mb-5">Fitur</h1>
                                        <div class="text-gray-600 fw-semibold fs-5">
                                                Nikmati Fitur yang kami berikan.
                                        </div>
                                </div>                       
                                <div class="row g-10">
                                                <div class="col-xl-4">
                                                        <div class="d-flex h-100 align-items-center">
                                                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                                                    <div class="mb-7 text-center">
                                                                                <h1 class="text-dark mb-5 fw-bolder">Perpendek Tautan</h1>
                                                                                <div class="text-gray-600 fw-semibold mb-5">
                                                                                        150+ orang menggunakan fitur ini<br> Cobain sekarang                                              
                                                                                </div>
                                                                        </div>
                                                                        <div class="w-100 mb-10">  
                                                                                        <div class="d-flex align-items-center mb-5">             
                                                                                            <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                                Pemendekan URL dalam skala besar                                               
                                                                                            </span> 
                                                                                                <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                        </div>
                                                                                        <div class="d-flex align-items-center mb-5">             
                                                                                            <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                                Tautan khusus dengan merek Anda                                                
                                                                                            </span> 
                                                                                                <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                        </div>                                         
                                                                                        <div class="d-flex align-items-center mb-5">             
                                                                                            <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                                pengalihan URL                                              
                                                                                            </span> 
                                                                                                <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                        </div>                                           
                                                                                        <div class="d-flex align-items-center mb-5">             
                                                                                                <span class="fw-semibold fs-6 text-gray-800 flex-grow-1">
                                                                                                    Tautan dan pelacakan halaman                                              
                                                                                                </span> 
                                                                                                <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                        </div>   
                                                                                                
                                                                        </div>
                                                                        <a href="#" class="btn btn-sm btn-primary">Cobain</a>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="d-flex h-100 align-items-center">
                                                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                                                <div class="mb-7 text-center">
                                                                            <h1 class="text-dark mb-5 fw-bolder">Kode QR</h1>
                                                                            <div class="text-gray-600 fw-semibold mb-5">
                                                                                    150+ orang menggunakan fitur ini<br> Cobain sekarang                                              
                                                                            </div>
                                                                    </div>
                                                                    <div class="w-100 mb-10">  
                                                                                    <div class="d-flex align-items-center mb-5">             
                                                                                        <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                            Kode QR yang  dapat disesuaikan                                             
                                                                                        </span> 
                                                                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                    </div>
                                                                                    <div class="d-flex align-items-center mb-5">             
                                                                                        <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                            Kode QR Dinamis                                             
                                                                                        </span> 
                                                                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                    </div>                                         
                                                                                    <div class="d-flex align-items-center mb-5">             
                                                                                        <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                            Jenis Kode QR & opsi tujuan                                            
                                                                                        </span> 
                                                                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                    </div>                                           
                                                                                    <div class="d-flex align-items-center mb-5">             
                                                                                            <span class="fw-semibold fs-6 text-gray-800 flex-grow-1">
                                                                                                Tautan dan pelacakan halaman                                              
                                                                                            </span> 
                                                                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                    </div>   
                                                                                            
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-primary">Cobain</a>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="d-flex h-100 align-items-center">
                                                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                                                <div class="mb-7 text-center">
                                                                            <h1 class="text-dark mb-5 fw-bolder">Link di BIO</h1>
                                                                            <div class="text-gray-600 fw-semibold mb-5">
                                                                                    150+ orang menggunakan fitur ini<br> Cobain sekarang                                              
                                                                            </div>
                                                                    </div>
                                                                    <div class="w-100 mb-10">  
                                                                                    <div class="d-flex align-items-center mb-5">             
                                                                                        <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                            URL khusus untuk media sosial                                             
                                                                                        </span> 
                                                                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                    </div>
                                                                                    <div class="d-flex align-items-center mb-5">             
                                                                                        <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                            Desain yang dapat disesuaikan                                            
                                                                                        </span> 
                                                                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                    </div>                                         
                                                                                    <div class="d-flex align-items-center mb-5">             
                                                                                        <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                                            Tautan yang mudah dikelola                                           
                                                                                        </span> 
                                                                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                    </div>                                           
                                                                                    <div class="d-flex align-items-center mb-5">             
                                                                                            <span class="fw-semibold fs-6 text-gray-800 flex-grow-1">
                                                                                                Tautan dan pelacakan halaman                                              
                                                                                            </span> 
                                                                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                                    </div>   
                                                                                            
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-primary">Cobain</a>
                                                            </div>
                                                    </div>
                                                </div>
                                </div>
                        </div>   
                </div>
            </div>
        </div>
        <div class="container mt-20">
            <div class="text-center mb-17">
                <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">Apa yang kata mereka?</h3>
                <div class="fs-5 text-muted fw-bold">Dengar testimoni dari mereka </div>
            </div>
            <div class="row g-lg-10 mb-10 mb-lg-20">
                <div class="col-lg-4">
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <div class="mb-7">
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                            </div>
                            <div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have ever used. The codes are up to tandard. The css styles are very clean. In fact the cleanest and the most up to standard I have ever seen.</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="assets/media/avatars/300-1.jpg" class="" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Paul Miles</a>
                                <span class="text-muted d-block fw-bold">Mahasiswa</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <div class="mb-7">
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                            </div>
                            <div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have ever used. The codes are up to tandard. The css styles are very clean. In fact the cleanest and the most up to standard I have ever seen.</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="assets/media/avatars/300-1.jpg" class="" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Paul Miles</a>
                                <span class="text-muted d-block fw-bold">Mahasiswa</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <div class="mb-7">
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="ki-outline ki-star fs-5"></i>
                                </div>
                            </div>
                            <div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have ever used. The codes are up to tandard. The css styles are very clean. In fact the cleanest and the most up to standard I have ever seen.</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="assets/media/avatars/300-1.jpg" class="" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Paul Miles</a>
                                <span class="text-muted d-block fw-bold">Mahasiswa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div id="kt_app_toolbar" class="app-container py-6">
        <div id="kt_app_toolbar_container" class="app-container container">
            <div class="card-body p-lg-20 pb-lg-0">
                    <div class="mb-17">
                            <div class="d-flex flex-stack mb-5">
                                    <h1 class="text-dark">Artikel</h1>
                                    <a href="#" class="fs-6 fw-semibold link-primary">
                                            Lihat Lainnya...
                                    </a>   
                            </div>  
                            <div class="separator separator-dashed mb-9"></div>
                            <div class="row g-10"> 
                                    <div class="col-md-4">           
                                        <div class="card-xl-stretch me-md-6">    
                                                <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('/metronic8/demo30/assets/media/stock/600x400/img-73.jpg')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">   
                                                        <img src="/metronic8/demo30/assets/media/svg/misc/video-play.svg" class="position-absolute top-50 start-50 translate-middle" alt="">
                                                </a> 
                                                <div class="m-0">    
                                                        <a href="/metronic8/demo30/../demo30/pages/user-profile/overview.html" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                                Admin Panel - How To Started the Dashboard Tutorial        
                                                        </a>       
                                                        <div class="fw-semibold fs-5 text-gray-600 text-dark my-4">    
                                                                                        We’ve been focused on making a the from also not been 
                                                                                        afraid to and step away been focused create eye
                                                        </div>
                                                        <div class="fs-6 fw-bold">
                                                                <a href="/metronic8/demo30/../demo30/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Jane Miller</a>
                                                                <span class="text-muted">on Mar 21 2021</span>     
                                                        </div>
                                                </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-4">           
                                        <div class="card-xl-stretch me-md-6">    
                                                <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('/metronic8/demo30/assets/media/stock/600x400/img-73.jpg')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">   
                                                        <img src="/metronic8/demo30/assets/media/svg/misc/video-play.svg" class="position-absolute top-50 start-50 translate-middle" alt="">
                                                </a> 
                                                <div class="m-0">    
                                                        <a href="/metronic8/demo30/../demo30/pages/user-profile/overview.html" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                                Admin Panel - How To Started the Dashboard Tutorial        
                                                        </a>       
                                                        <div class="fw-semibold fs-5 text-gray-600 text-dark my-4">    
                                                                                        We’ve been focused on making a the from also not been 
                                                                                        afraid to and step away been focused create eye
                                                        </div>
                                                        <div class="fs-6 fw-bold">
                                                                <a href="/metronic8/demo30/../demo30/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Jane Miller</a>
                                                                <span class="text-muted">on Mar 21 2021</span>     
                                                        </div>
                                                </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-4">           
                                        <div class="card-xl-stretch me-md-6">    
                                                <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('/metronic8/demo30/assets/media/stock/600x400/img-73.jpg')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">   
                                                        <img src="/metronic8/demo30/assets/media/svg/misc/video-play.svg" class="position-absolute top-50 start-50 translate-middle" alt="">
                                                </a> 
                                                <div class="m-0">    
                                                        <a href="/metronic8/demo30/../demo30/pages/user-profile/overview.html" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                                Admin Panel - How To Started the Dashboard Tutorial        
                                                        </a>       
                                                        <div class="fw-semibold fs-5 text-gray-600 text-dark my-4">    
                                                                                        We’ve been focused on making a the from also not been 
                                                                                        afraid to and step away been focused create eye
                                                        </div>
                                                        <div class="fs-6 fw-bold">
                                                                <a href="/metronic8/demo30/../demo30/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Jane Miller</a>
                                                                <span class="text-muted">on Mar 21 2021</span>     
                                                        </div>
                                                </div>
                                        </div>
                                    </div>  
                            </div>
                    </div>
                    <div class="mb-17">
                            <div class="d-flex flex-stack mb-5">
                                    <h1 class="text-dark">Kegiatan</h1>
                                    <a href="#" class="fs-6 fw-semibold link-primary">
                                        Lihat Lainnya...
                                    </a>   
                            </div>  
                            <div class="separator separator-dashed mb-9"></div>
                            <div class="row g-10">   
                                    <div class="col-md-4">           
                                        <div class="card-xl-stretch me-md-6">  
                                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/metronic8/demo30/assets/media/stock/600x400/img-23.jpg">       
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/metronic8/demo30/assets/media/stock/600x400/img-23.jpg')">                       
                                                        </div>
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                                <i class="ki-outline ki-eye fs-2x text-white"></i>       
                                                        </div>  
                                                </a>  
                                                <div class="mt-5">    
                                                        <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                                25 Products Mega Bundle with 50% off discount amazing        
                                                        </a>       
                                                        <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">    
                                                                We’ve been focused on making a the from also not been eye        
                                                        </div>
                                                        <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                                                <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                                                                        <span class="fs-6 fw-semibold text-gray-400">$</span>
                                                                        28            
                                                                    </span>
                                                                <a href="#" class="btn btn-sm btn-primary">Purchase</a>     
                                                        </div>
                                                </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-4">           
                                        <div class="card-xl-stretch me-md-6">  
                                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/metronic8/demo30/assets/media/stock/600x400/img-23.jpg">       
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/metronic8/demo30/assets/media/stock/600x400/img-23.jpg')">                       
                                                        </div>
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                                <i class="ki-outline ki-eye fs-2x text-white"></i>       
                                                        </div>  
                                                </a>  
                                                <div class="mt-5">    
                                                        <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                                25 Products Mega Bundle with 50% off discount amazing        
                                                        </a>       
                                                        <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">    
                                                                We’ve been focused on making a the from also not been eye        
                                                        </div>
                                                        <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                                                <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                                                                        <span class="fs-6 fw-semibold text-gray-400">$</span>
                                                                        28            
                                                                    </span>
                                                                <a href="#" class="btn btn-sm btn-primary">Purchase</a>     
                                                        </div>
                                                </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-4">           
                                        <div class="card-xl-stretch me-md-6">  
                                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="/metronic8/demo30/assets/media/stock/600x400/img-23.jpg">       
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('/metronic8/demo30/assets/media/stock/600x400/img-23.jpg')">                       
                                                        </div>
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                                <i class="ki-outline ki-eye fs-2x text-white"></i>       
                                                        </div>  
                                                </a>  
                                                <div class="mt-5">    
                                                        <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                                25 Products Mega Bundle with 50% off discount amazing        
                                                        </a>       
                                                        <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">    
                                                                We’ve been focused on making a the from also not been eye        
                                                        </div>
                                                        <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                                                <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                                                                        <span class="fs-6 fw-semibold text-gray-400">$</span>
                                                                        28            
                                                                    </span>
                                                                <a href="#" class="btn btn-sm btn-primary">Purchase</a>     
                                                        </div>
                                                </div>
                                        </div>
                                    </div>  
                            </div>
                    </div>
             </div>
        </div>
    </div>
</div>

@endsection
