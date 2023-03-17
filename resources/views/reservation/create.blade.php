@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить запись</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Добавить запись</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('reservation.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                            placeholder="Имя">
                    </div>

                    <div class="form-group">
                        <input type="phone" value="{{ old('phone') }}" name="phone" class="form-control"
                            placeholder="Телефон">
                    </div>

                    <div class="form-group">
                        <select name="master_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите мастера</option>
                            @foreach ($masters as $master)
                                <option value="{{ $master->id }}" {{ $master->id == old('master_id') ? 'selected' : '' }}>
                                    {{ $master->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="services[]" class="services" multiple="multiple" data-placeholder="Выберите услуги"
                            style="width: 100%;">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ is_array(old('services')) && in_array($service->id, old('services')) ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker-create" data-target-input="nearest">
                            <input name="date" type="text" class="form-control datetimepicker-input"
                                data-target="#datetimepicker-create" />
                            <div class="input-group-append" data-target="#datetimepicker-create"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <select name="time" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled>Выберите время</option>
                        <option value="10">
                            10
                        </option>
                        <option value="11">
                            11
                        </option>
                        <option value="12">
                            12
                        </option>
                        <option value="13">
                            13
                        </option>
                        <option value="14">
                            14
                        </option>
                        <option value="15">
                            15
                        </option>
                        <option value="16">
                            16
                        </option>
                        <option value="17">
                            17
                        </option>
                        <option value="18">
                            18
                        </option>
                        <option value="19">
                            19
                        </option>
                        <option value="20">
                            20
                        </option>
                        <option value="21">
                            21
                        </option>
                    </select>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
