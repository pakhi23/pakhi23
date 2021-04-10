@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header mt-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <h1 class="well">CMS Form</h1>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12 well">
                            <div class="row">
                                <form action="{{ url('updatecmss/' . $input->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 form-group">

                                            <label>Page Name</label>
                                            <input type="text" name="name" value="{{ $input->name }}"
                                                placeholder="Enter Name Here.." class="form-control">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label>Barner Image</label>
                                            <input type="file" name="image" value="{{ $input->image }}"
                                                placeholder="select image" class="form-control">
                                        </div>

                                        <div class="card-body">
                                            <textarea id="summernote1" name="content">
                                                         {{ $input->content }}
                                                        </textarea>
                                        </div>
                                      

                                     
                                            <button type="submit" class="btn btn-lg btn-info">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('script')
        <script>
            $(function() {
                // Summernote
                $('#summernote1').summernote()
                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            })

        </script>
    @endpush
@endsection
