
<!-- Layout -->
@extends('admin.main')

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
                <h2 class="title-content">Manage Categories</h2>
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
                            <th style="width: 5%;">#</th>
                            <th style="width: 30%; min-width: 180px;">Name</th>
                            <th style="width: auto;min-width: 100px;">Url</th>
                            <th style="width: 5%; min-width: 50px;">Serial</th>
                            <th style="width: 10%; min-width: 100px;">Create At</th>
                            <th style="width: 10%; min-width: 100px;">Update At</th>
                            <th style="width: 5%; min-width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Links</td>
                            <td>
                                /links
                            </td>
                            <td>1</td>
                            <td>09/04/2020</td>
                            <td>09/04/2020</td>
                            <td>
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="far fa-edit"></i>
                                </button>

                                <button type="button" class="btn btnDelete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Files</td>
                            <td>
                                /files
                            </td>
                            <td>1</td>
                            <td>09/04/2020</td>
                            <td>09/04/2020</td>
                            <td>
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="far fa-edit"></i>
                                </button>

                                <button type="button" class="btn btnDelete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputAddress">Title</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Programming Language Book" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Url</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="C Sharp . [docx | pdf | ...]" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Tags</label>
                            <input style="width: 100% !important;" type="text" class="form-control" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

