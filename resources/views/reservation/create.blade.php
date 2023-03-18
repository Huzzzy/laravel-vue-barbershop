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
                        <div class="input-group date" id="datetimepicker-reservation-create" data-target-input="nearest">
                            <input name="date" type="text" class="form-control datetimepicker-input"
                                data-target="#datetimepicker-reservation-create" />
                            <div class="input-group-append" data-target="#datetimepicker-reservation-create"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="time" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите время</option>
                            @for ($i = 10; $i < 22; $i++)
                                <option value="{{ $i }}" {{ old('time') ? 'selected' : '' }}>
                                    {{ $i }}:00
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
