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

                    <div class="form-group" id="service">
                        <label for="service">Выберите услуги</label>

                        <select name="services[]" class="services" multiple="multiple" data-placeholder="Выберите услуги"
                            id="services" style="width: 100%;">
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

                        @error('services')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="master">
                        <label for="master">Выберите мастера</label>

                        <select name="master_id" id="master_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите мастера</option>
                            @foreach ($masters as $master)
                                <option value="{{ $master->id }}"
                                    {{ $master->id == old('master_id', $master->id) ? 'selected' : '' }}>
                                    {{ $master->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('master_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <input type="button" value="Подтвердить" onclick="getDates()" class="btn btn-primary mt-2"
                            id="master_btn">
                    </div>

                    <div class="form-group" id="date">
                        <label for="date">Выберите дату</label>

                        <div class="input-group date" id="datetimepicker-reservation-edit" data-target-input="nearest">
                            <input name="date" id="date_input" type="text" class="form-control datetimepicker-input"
                                data-target="#datetimepicker-reservation-edit" />
                            <div class="input-group-append" data-target="#datetimepicker-reservation-edit"
                                data-toggle="datetimepicker" onclick="getDateBtn()">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>

                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <input type="button" value="Подтвердить" onclick="getTime()" class="btn btn-primary mt-2 invisible"
                            id="date_btn">
                    </div>

                    <div class="form-group" id="time">
                        <label for="time">Выберите время</label>

                        <select name="time" class="form-control select2" style="width: 100%;" id="select_time">
                            <option selected="selected" disabled>Выберите время</option>
                        </select>

                        @error('time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div class="form-group" id="confirmation">
                            <input type="submit" class="btn btn-primary mt-2" value="Обновить">
                        </div>

                        <div class="form-group" id="reset">
                            <input type="button" class="btn btn-primary mt-2" value="Сбросить" onclick="reset()">
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <script>
        var today = new Date();
        var date = (new Date()).toISOString().slice(0, 10);

        date = date.split(/\s*-\s*/)

        var nowDate = date[1] + "/" + date[2] + "/" + date[0]
        var maxReservationDate = ++date[1] + "/" + date[2] + "/" + date[0]

        var reservationDate = document.querySelector('.reservation-date');
        if (reservationDate !== null) {
            reservationDate = document.querySelector('.reservation-date').getAttribute('data-attr')
        }

        function getMasterBtn() {
            document.getElementById("master_btn").classList.remove("invisible");
        }

        function getDateBtn() {
            document.getElementById("date_btn").classList.remove("invisible");
        }

        function getDates() {
            document.getElementById("master_btn").classList.add("invisible");

            $('#date_input').val('');
            $('#select_time').empty();
            var select = document.getElementById("master_id");
            var id = select.value;


            $.get(`/api/available-dates/${id}`, function(data) {
                $('#datetimepicker-reservation-edit').datetimepicker({
                    format: 'L',
                    enabledDates: data.data.enabledDates,
                    minDate: nowDate,
                    maxDate: maxReservationDate,
                    defaultDate: reservationDate,
                });
            });

        }

        function getTime() {
            $('#select_time').empty();
            document.getElementById("date_btn").classList.add("invisible");

            var select = document.getElementById("date_input");
            var time = select.value;

            $.get(`/api/available-time/${time}`, function(data) {
                $.each(data.data.time, function(key, value) {
                    $('#select_time').append('<option value="' + value +
                        '">' + value + ':00' + '</option>');
                });
            });
        }

        function reset() {
            $('#date_input').val('');
            $('#select_time').empty();
            $('#master_id').val('');
            $('#services').val('');
        }
    </script>
@endsection
