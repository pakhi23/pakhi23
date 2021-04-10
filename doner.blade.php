@extends('admin.layouts.index')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Donor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Doner<a href="{{ url('country-state-city') }}" class="btn btn-primary"
                                    style="margin-left:1200px;">Add Doner</a></h3>

                        </div>
                        <!-- /.card-header -->
                        {{-- search filter --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Filter</h3>
                                <div class="card-tools">
                                    <!-- Collapse Button -->
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- /.form-group -->

                                {{-- bloodgroup --}}
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label>Blood Group</label>
                                            <select class="form-control bloodgroup bloodgroup_select2">
                                                <option value="">Select</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'A Positive' ? 'selected' : '' }}>A
                                                    Positive</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'A Negative' ? 'selected' : '' }}>A
                                                    Negative</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'A Unknown' ? 'selected' : '' }}>A
                                                    Unknown</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'B Positive' ? 'selected' : '' }}>B
                                                    Positive</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'B Negative' ? 'selected' : '' }}>B
                                                    Negative</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'B Unknown' ? 'selected' : '' }}>B
                                                    Unknown</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'AB Positive' ? 'selected' : '' }}>
                                                    AB Positive</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'AB Negative' ? 'selected' : '' }}>
                                                    AB Negative</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'AB Unknown' ? 'selected' : '' }}>
                                                    AB
                                                    Unknown</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'O Positive' ? 'selected' : '' }}>
                                                    O
                                                    Positive</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'O Negative' ? 'selected' : '' }}>
                                                    O
                                                    Negative</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'O Unknown' ? 'selected' : '' }}>O
                                                    Unknown</option>
                                                <option
                                                    {{ request()->get('bloodgroup') == 'Unknown' ? 'selected' : '' }}>
                                                    Unknown</option>
                                            </select>
                                        </div>


                                        {{-- bloodgroup --}}
                                        {{-- state --}}

                                        <div class="form-group col-sm-4">
                                            <label>State</label>
                                            <select class="form-control state_select2 state" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach ($states as $state)
                                                    <option {{ request()->get('state') == $state->id ? 'selected' : '' }}
                                                        value="{{ $state->id }}">
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- state --}}

                                        {{-- city --}}
                                        <div class="form-group col-sm-4">
                                            <label>City</label>
                                            <select class="form-control city_select2 city" style="width: 100%;">
                                                <option value="">Select</option>

                                            </select>
                                        </div>
                                        {{-- city --}}

                                        <!-- /.form-group -->
                                    </div>
                                </div>
                                <div>
                                    <button type="button" OnClick="filter();" class="btn btn-danger btn-sm mb-2 mr-2"
                                        style="float:right;">Add Filter</button>
                                    <button type="button" OnClick="window.location.href={{ json_encode(url('/doner')) }}"
                                        class="btn btn-danger btn-sm mb-2 mr-2" style="float:right;">Remove Filter</button>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.search filtereS -->

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>Full name</th>
                                        <th>Mobile number</th>
                                        <th>blood group</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donor as $donorr)
                                        <tr>

                                            <td>{{ $donorr->name }}</td>
                                            <td>{{ $donorr->number }}</td>
                                            <td>{{ $donorr->bloodgroup }}</td>
                                            <td>{{ $donorr->countryname->name }}</td>
                                            <td>{{ $donorr->cityname->name }}</td>


                                            <td>
                                                <div class="row">

                                                    <a href="{{ url('editdoner/' . $donorr->id) }}"
                                                        class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>


                                                    <form method="post"
                                                        action="{{ url('distroydonor/' . $donorr->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a Onclick="confirmDelete(this)" class="btn btn-primary"><i
                                                                class="fas fa-trash"></i></a>
                                                    </form>
                                            </td>
                        </div>


                        </tr>

                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <!-- /.col -->
        </div>
        </div>

    </section>



    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>

    <script>
        function confirmDelete(element) {
            var form = $(element).parent()
            swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }).then((result) => {
                if (result) {
                    form.submit();
                }
            })
        }

    </script>


    <script>
        function filter() {
            var city = $('.city').val();
            var state = $('.state').val();
            var bloodgroup = $('.bloodgroup').val();
            var APP_URL = {!! json_encode(url('/doner')) !!}
            APP_URL = APP_URL + '?'
            let flag = true;
            if (city != '') {
                APP_URL = APP_URL + 'city=' + city + '&'
            }
            if (state != '') {
                flag = false;
                APP_URL = APP_URL + 'state=' + state + '&'
            }
            if (bloodgroup != '') {
                flag = false;
                APP_URL = APP_URL + 'bloodgroup=' + bloodgroup + '&'
            }

            window.location.href = APP_URL

        }

        $(document).ready(function() {

            $('.state_select2').select2();
            $('.city_select2').select2();
            $('.bloodgroup_select2').select2();


            $(".state").on('change', function() {
                var state = $('.state').val();
                if (state !== '') {
                    $.ajax({
                        type: 'GET',
                        url: '/get-cities-by-state/' + state,

                        success: function(data) {
                            var html = '';
                            data.forEach(element => {
                                html += '<option value="' + element.id + '">' + element
                                    .name + '</option>'
                            });
                            $('.city').html(html);

                        }
                    });
                }

            });


        });

    </script>




@endsection
