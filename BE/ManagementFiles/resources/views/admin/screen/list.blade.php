<!-- Layout -->
@extends('admin.layout')

<!-- Content -->
@section('main-content')
<main class="page-content pt-2" style="padding-top: 0 !important">
    {{--  <div id="overlay"></div>  --}}
    <div class="container-fluid p-3" >
        <!--style="position: relative; padding-top: 0 !important"-->

        <!----------------Top - Navbar------------------------->
        @include('admin/elements/topnavbar')
        <!----------------End - Top - Navbar------------------------->

        <div class="row title" >
            <div class="form-group col-md-12">
                <h2 class="title-content">
                    {{ $title_main }}
                </h2>
            </div>
        </div>
        <div class="row main-content" style="position: relative" id="pjax-container">
            <div class="form-group col-md-12" >
                <button type="button" class="btn btn-info btn-add-data" ><i class="far fa-plus-square" style="margin-right: 5px ;"></i>Add</button>
            </div>
            <div id="pjax-container" class="form-group col-md-12" style="height: 100%">
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
                <!--Pagination-->
                <div style="clearfix"></div>
                <div class="box-footer " style=" width: 100%;float: right; padding-right: 15px; padding-left: 1 0px">
                    {!! $resultItems??'' !!}
                    {!! $pagination??'' !!}
                 </div>
            </div>
             <div id="loading" >
                <div id="overlay" class="overlay" ><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
            </div>
        </div>
    </div>

    <!--Modal Insert and Update-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" data-url="{{ route('category.store')}}" method="POST" role="form" id="formStore">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="inputID" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input name="title" type="text" class="form-control" id="inputTitle" placeholder="link" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputUrl">Url</label>
                            <input name="url" type="text" class="form-control" id="inputUrl" placeholder="https://google.com" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btnAdd" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@push('scripts')

<script src="{{ asset('admin/lib/jquery.pjax.js') }}" type="text/javascript"></script>
<script type="text/javascript">

    /*------------using pjax load table-----------------*/
    $(document).ready(function(){
        // does current browser support PJAX
        if ($.support.pjax) {
        $.pjax.defaults.timeout = 4000; // time in milliseconds
        }
    });

    $(document).on('pjax:send', function() {
        $('#loading').show()
    });

    $(document).on('pjax:complete', function() {
        $('#table').DataTable({
            "scrollY": "70vh",
            "scrollX": true,
            "scrollCollapse": true,
            "paging": true,
            "responsive": true,
            "bAutoWidth": true,
            "bInfo": false,
            "paging": false,
            "bPaginate": false,
            "searching": false
        });
        $('#loading').hide()
    });

    $(function(){
        $(document).pjax('a.page-link', '#pjax-container');
    });

    /*------------CRUD laravel with ajax-----------------*/
    $(document).on('click','.btn-add-data', function() {
       $('#exampleModalCenter').modal('show');
       $('.modal-title').text( '{{ trans('admin.title_modal_add') }}');

    });

    // function insert or update item
    $(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'post',
                url: url,
                data: new FormData( this ),
                dataType : 'json',
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data['success'] + " || " + data['msg']);
                    $('#exampleModalCenter').modal('hide');
                    $.pjax.reload({container:'#pjax-container'});
                    $('#formStore')[0].reset();
                }
                ,error: function(data, textStatus, errorThrown) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });
        });
    });

    // function show item
    function showItem(id){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:'post',
            url : '{{ $urlShowItem ?? '' }}',
            data :{id : id},
            success: function (data) {
                $('#exampleModalCenter').modal('show');
                $('.modal-title').text( '{{ trans('admin.title_modal_update') }}');
                $('#inputTitle').val(data['title']);
                $('#inputUrl').val(data['url']);
                $('#inputID').val(data['id']);
            }
            ,error: function(data, textStatus, errorThrown) {
                var errors = data.responseJSON;
                alert(errors );
            }
        });
    }

    // function delete item
    function  deleteItem(ids){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'post',
                    url: '{{ $urlDeleteItem ?? '' }}',
                    data: {ids : ids},
                    success: function (data) {
                        if(data){
                            $.pjax.reload('#pjax-container');
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );

                        }else{
                            $.pjax.reload('#pjax-container');
                            Swal.fire(
                                'Deleted!',
                                'Error',
                                'error'
                            );
                        }
                    },
                    error: function(data){
                        console.log('error' + data);
                    }
                });
            }
        });
    }
</script>
@endpush

@endsection

