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
                                <span class="text-white fw-bold fs-3 mb-1 text-end">{{$data['total_links']}}</span> 
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
                                        <span class="card-label fw-bold fs-1 text-gray-800">Tautan Saya</span>
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Tautan khusus dengan untuk Anda</span>
                                    </h3>
                                </div>
                                <div class="card-body py-3">
                                    <table id="kt_datatable_horizontal_scroll" class="table table-striped table-row-bordered gy-5 gs-7">
                                        <thead>
                                            <tr>
                                                <td>Tautan</td>
                                                <td>Tautan Pendek</td>
                                                <td>Pengunjung</td>
                                                <td>Dibuat</td>
                                                <td class="text-end">Detail</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['links'] as $link)
                                            <tr>
                                                <td>{{ $link->url }}</td>
                                                <td>{{ url($link->hash) }}</td>
                                                <td class="text-center">{{ $link->visitors_count }}</td>
                                                <td>{{ $link->created_at->diffForHumans() }}</td>
                                                <td class="text-end">
                                                    <a href="{{ route('link_show', $link->id) }}" class="btn btn-icon btn-light-warning btn-sm">
                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                                                                </g>
                                                            </svg>
                                                        </span>                            
                                                    </a>
                                                </td>
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
