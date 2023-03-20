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

                    <div class="form-group position-absolute" id="user">
                        <label for="user">Введите имя и номер телефона</label>

                        <input type="text" value="{{ old('name') }}" name="name" id="user_name" class="form-control"
                            placeholder="Имя" onchange="getUserBtn()">

                        <input type="phone" value="{{ old('phone') }}" name="phone" id="user_phone" class="form-control"
                            placeholder="Телефон" onchange="getUserBtn()">


                        <input type="button" value="Подтвердить" onclick="getServices()"
                            class="btn btn-primary mt-2 invisible" id="user_btn">
                    </div>

                    <div class="form-group position-absolute invisible" id="service">
                        <label for="service">Выберите услуги</label>

                        <select name="services[]" class="services" multiple="multiple" data-placeholder="Выберите услуги" id="services"
                            style="width: 100%;" onchange="getServiceBtn()">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ is_array(old('services')) && in_array($service->id, old('services')) ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>

                        <input type="button" value="Подтвердить" onclick="getMasters()"
                            class="btn btn-primary mt-2 invisible" id="service_btn">
                    </div>

                    <div class="form-group position-absolute invisible" id="master">
                        <label for="master">Выберите мастера</label>

                        <select name="master_id" id="master_id" class="form-control select2" style="width: 100%;"
                            onchange="getMasterBtn()">
                            <option selected="selected" disabled>Выберите мастера</option>
                            @foreach ($masters as $master)
                                <option value="{{ $master->id }}" {{ $master->id == old('master_id') ? 'selected' : '' }}>
                                    {{ $master->name }}
                                </option>
                            @endforeach
                        </select>

                        <input type="button" value="Подтвердить" onclick="getDates()"
                            class="btn btn-primary mt-2 invisible" id="master_btn">
                    </div>

                    <div class="form-group position-absolute invisible" id="date">
                        <label for="date">Выберите дату</label>

                        <div class="input-group date" id="datetimepicker-reservation-create" data-target-input="nearest">
                            <input name="date" id="date_input" type="text" class="form-control datetimepicker-input"
                                data-target="#datetimepicker-reservation-create" />
                            <div class="input-group-append" data-target="#datetimepicker-reservation-create"
                                data-toggle="datetimepicker" onclick="getDateBtn()">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>

                        <input type="button" value="Подтвердить" onclick="getTime()" class="btn btn-primary mt-2 invisible"
                            id="date_btn">
                    </div>

                    <div class="form-group position-absolute invisible" id="time">
                        <label for="time">Выберите время</label>

                        <select name="time" class="form-control select2" style="width: 100%;" onchange="getTimeBtn()"
                            id="select_time">
                            <option selected="selected" disabled>Выберите время</option>
                        </select>

                        <input type="button" value="Подтвердить" onclick="getCheck()"
                            class="btn btn-primary mt-2 invisible" id="time_btn">
                    </div>

                    <div class="form-group position-absolute invisible" id="check">
                        <input type="button" class="btn btn-primary mt-2" value="Проверить" onclick="check()">
                    </div>

                    <div>
                        <div class="form-group position-absolute invisible" id="confirmation">
                            <input type="submit" class="btn btn-primary mt-2" value="Записаться">
                        </div>

                        <div class="form-group position-absolute invisible" id="reset">
                            <input type="button" class="btn btn-primary mt-2" value="Сбросить" onclick="check(), reset()">
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

        function getUserBtn() {
            document.getElementById("user_btn").classList.remove("invisible");
        }

        function getServiceBtn() {
            document.getElementById("service_btn").classList.remove("invisible");
        }

        function getMasterBtn() {
            document.getElementById("master_btn").classList.remove("invisible");
        }

        function getDateBtn() {
            document.getElementById("date_btn").classList.remove("invisible");
        }

        function getTimeBtn() {
            document.getElementById("time_btn").classList.remove("invisible");
        }



        function getServices() {
            document.getElementById("user").classList.add("invisible");
            document.getElementById("service").classList.remove("invisible");
        }

        function getMasters() {
            document.getElementById("service").classList.add("invisible");
            document.getElementById("master").classList.remove("invisible");
        }

        function getDates() {
            $('#date_input').val('');
            $('#select_time').empty();
            var select = document.getElementById("master_id");
            var id = select.value;

            document.getElementById("master").classList.add("invisible");
            document.getElementById("date").classList.remove("invisible");

            $.get(`/api/available-dates/${id}`, function(data) {
                $('#datetimepicker-reservation-create').datetimepicker({
                    format: 'L',
                    enabledDates: data.data.enabledDates,
                    minDate: nowDate,
                    maxDate: maxReservationDate,
                });
            });

        }

        function getTime() {
            $('#select_time').empty();

            var select = document.getElementById("date_input");
            var time = select.value;

            $.get(`/api/available-time/${time}`, function(data) {
                $.each(data.data.time, function(key, value) {
                    $('#select_time').append('<option value="' + value +
                        '">' + value + ':00' + '</option>');
                });
            });



            document.getElementById("date").classList.add("invisible");
            document.getElementById("time").classList.remove("invisible");
        }

        function getCheck() {
            document.getElementById("time").classList.add("invisible");
            document.getElementById("check").classList.remove("invisible");
        }

        function check() {
            document.getElementById("user").classList.remove("invisible", "position-absolute");
            document.getElementById("service").classList.remove("invisible", "position-absolute");
            document.getElementById("master").classList.remove("invisible", "position-absolute");
            document.getElementById("date").classList.remove("invisible", "position-absolute");
            document.getElementById("time").classList.remove("invisible", "position-absolute");
            document.getElementById("confirmation").classList.remove("invisible", "position-absolute");
            document.getElementById("reset").classList.remove("invisible", "position-absolute");

            document.getElementById("user_btn").classList.add("invisible");
            document.getElementById("service_btn").classList.add("invisible");
            document.getElementById("master_btn").classList.add("invisible");
            document.getElementById("time_btn").classList.add("invisible");
            document.getElementById("date_btn").classList.add("invisible");

            document.getElementById("check").classList.add("invisible");
        }

        function getConfirmation() {
            document.getElementById("date").classList.add("invisible");
            document.getElementById("confirmation").classList.remove("invisible");
        }

        function reset() {
            $('#user_name').val('');
            $('#user_phone').val('');
            $('#date_input').val('');
            $('#select_time').empty();
            $('#master_id').val('');
            $('#services').val('');
        }
    </script>
@endsection
