@extends('layouts.app')

@section('content')

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div id="kt_app_toolbar" class="app-toolbar py-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex align-items-start ">
                <div class="d-flex flex-column flex-row-fluid">     
                    <div class="d-flex align-items-center pt-1">     
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold">        
                            <li class="breadcrumb-item text-white fw-bold lh-1">
                                <a href="#" class="text-white text-hover-primary">
                                <i class="ki-outline ki-home text-white fs-3"></i> 
                                </a>
                            </li>
                                <li class="breadcrumb-item">
                                    <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>               
                                </li>
                                <li class="breadcrumb-item text-white fw-bold lh-1">
                                    Dashboard                                   
                                </li>         
                            </ul>
                    </div>
                    <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">   
                        <div class="page-title d-flex align-items-center me-3">
                            <img alt="Logo" src="{{ asset('assets/media/saly.svg') }}" class="w-90px me-5">
                            <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">
                                Dashboard
                                <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-2">
                                    Hai {{ auth()->user()->name }} !!, <br> Selalulah Tersenyum :)       
                                </span>
                            </h1>
                        </div>
                        <div class="d-flex gap-4 gap-lg-13">
                            <div class="d-flex flex-column">           
                                <span class="text-white fw-bold fs-3 mb-1 text-end"></span> 
                                <div class="text-white opacity-50 fw-bold">Total Tautan</div>                   
                            </div>
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
                                        <span class="card-label fw-bold fs-1 text-gray-800">Detail Tautan</span>
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">{{ __('Links Detail') }}</span>
                                    </h3>
                                </div>
                                <div class="card-body py-3">
                                    <div class="mb-0 my-10">     
                                        <div class="d-flex flex-stack">
                                            <div class="d-flex align-items-center me-5">
                                                <div class="symbol symbol-30px me-5">
                                                    <span class="symbol-label">  
                                                        <i class="ki-outline ki-magnifier fs-3 text-gray-600"></i>                             
                                                    </span>                
                                                </div>
                                                <div class="me-5">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Tautan</a>
                                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">{{ $link->url }}</span>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex flex-stack">
                                            <div class="d-flex align-items-center me-5">
                                                <div class="symbol symbol-30px me-5">
                                                    <span class="symbol-label">  
                                                        <i class="ki-outline ki-magnifier fs-3 text-gray-600"></i>                             
                                                    </span>                
                                                </div>
                                                <div class="me-5">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Tautan Pendek</a>
                                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">{{ secure_url($link->hash) }}</span>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <div class="d-flex flex-stack">
                                            <div class="d-flex align-items-center me-5">
                                                <div class="symbol symbol-30px me-5">
                                                    <span class="symbol-label">  
                                                        <i class="ki-outline ki-magnifier fs-3 text-gray-600"></i>                             
                                                    </span>                
                                                </div>
                                                <div class="me-5">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Dibuat pada</a>
                                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">{{ $link->created_at->diffForHumans() }}</span>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-3"></div>
                                    </div>
                                    <table id="kt_datatable_horizontal_scroll" class="table table-striped table-row-bordered gy-5 gs-7">
                                        <thead>
                                            <tr>
                                                <td>{{ __('IP') }}</td>
                                                <td>{{ __('OS') }}</td>
                                                <td>{{ __('Browser') }}</td>
                                                <td>{{ __('Device') }}</td>
                                                <td>{{ __('Visited At') }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($visitors as $visitor)
                                            <tr>
                                                <td>{{ $visitor->ip }}</td>
                                                <td>{{ $visitor->os }}</td>
                                                <td>{{ $visitor->browser }}</td>
                                                <td>{{ $visitor->device }}</td>
                                                <td>{{ $visitor->created_at->diffForHumans() }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
