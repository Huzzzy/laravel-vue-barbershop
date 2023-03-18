@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать запись</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Редактировать запись</li>
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
                <form action="{{ route('reservation.update', $reservation->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <input disabled type="text" name="name" class="form-control"
                            placeholder="{{ $reservation->user->name }}">
                    </div>

                    <div class="form-group">
                        <input disabled type="phone" name="phone" class="form-control"
                            placeholder="+{{ $reservation->user->phone }}">
                    </div>

                    <div class="form-group">
                        <select name="master_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите мастера</option>
                            @foreach ($masters as $master)
                                <option value="{{ $master->id }}"
                                    {{ $master->id == old('master_id', $master->id) ? 'selected' : '' }}>
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
                                    {{ is_array($reservation->services->pluck('id')->toArray()) &&
                                    in_array($service->id, $reservation->services->pluck('id')->toArray())
                                        ? 'selected'
                                        : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="reservation-date" data-attr="{{ $reservation->date }}"></div>
                        <div class="input-group date" id="datetimepicker-reservation-edit" data-target-input="nearest">
                            <input name="date" type="text" class="form-control datetimepicker-input"
                                data-target="#datetimepicker-reservation-edit" />
                            <div class="input-group-append" data-target="#datetimepicker-reservation-edit"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="time" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите время</option>
                            @for ($i = 10; $i < 22; $i++)
                                <option value="{{ $i }}"
                                {{ $reservation->time == old('time', $i) ? 'selected' : '' }}>
                                    {{ $i }}:00
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
