
<!-- Layout -->
@extends('admin.layout')

<!-- Content -->
@section('main-content')
<main class="page-content pt-2">
    <div id="overlay"></div>
    <div class="container-fluid p-3">
        <div class="row">
            <div class="form-group col-md-12">
                <div class="icon-nav" style="margin-top: -14px; margin-left: 0px; ">
                    <a id="toggle-sidebar" href="#"> <i class="fas fa-bars" style="font-size: 24px; color: #646464;"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row title">
            <div class="form-group col-md-12">
                <h2 class="title-content">
                    {{ $title_main }}
                </h2>
            </div>
        </div>
        <div class="row main-content">
            <div class="form-group col-md-12">
                <button type="button" class="btn btn-info btn-add-data" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-plus-square" style="margin-right: 5px ;"></i>Add</button>
            </div>
            <div class="form-group col-md-12">
                <table id="table" class="table  table-hover" style="width: 100% !important;">
                    <thead style="width: 100%">
                        <tr>
                            @foreach($listTh as $key => $th)
                                <th style="{!!$th['style']!!}}"> {!! $th['data'] !!}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTr as $keyRow => $tr)
                        <tr>
                            @foreach ($tr as $key => $trtd)
                            <td>{!! $trtd !!}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
@endsection
