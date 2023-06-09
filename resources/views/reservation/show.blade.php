@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $reservation->date }}\\{{ $reservation->time }}:00</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{ $reservation->date }}\\{{ $reservation->time }}:00</li>
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

                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-2">
                                <a href="{{ route('reservation.edit', $reservation->id) }}"
                                    class="btn btn-primary">Редактировать</a>
                            </div>
                            <div class="mr-2">
                                <form action="{{ route('reservation.delete', $reservation->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Удалить" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $reservation->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата</th>
                                        <td>{{ $reservation->date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Время</th>
                                        <td>{{ $reservation->time }}:00</td>
                                    </tr>
                                    <tr>
                                        <th>Мастер</th>
                                        <td>
                                            <a href="{{ route('master.show', $reservation->master->id) }}">
                                                {{ $reservation->master->name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Пользователь</th>
                                        <td>
                                            <a href="{{ route('client.show', $reservation->client->id) }}">
                                                {{ $reservation->client->name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Услуги</th>
                                        <td>
                                            @foreach ($reservation->services as $service)
                                                <div>{{ $service->title }}</div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Статус</th>
                                        <td>{{ $reservation->statusTitle }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
