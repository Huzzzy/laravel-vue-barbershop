@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $reservation->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{ $reservation->id }}</li>
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
                                        <td>{{ $reservation->time }}</td>
                                    </tr>
                                    <tr>
                                        <th>Мастер</th>
                                        <td>{{ $reservation->master->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Пользователь</th>
                                        <td>{{ $reservation->user->name }}</td>
                                        <td>{{ $reservation->user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Услуги</th>
                                        @foreach ($reservation->services as $service)
                                            <td>{{ $service->title }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th>Статус</th>
                                        <td>{{ $reservation->status }}</td>
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
