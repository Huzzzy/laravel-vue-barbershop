@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Записи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Записи</li>
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
                        <!-- Right navbar links -->
                        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                            <ul class="navbar-nav ml-auto">
                                <!-- Notifications Dropdown Menu -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                        <i class="far fa-bell"></i>
                                        <span
                                            class="badge badge-warning navbar-badge">{{ $lastReservations->count() ?? 0 }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        @if ($lastReservations->count() > 0)
                                            <span class="dropdown-item dropdown-header">Уведомления: {{ $lastReservations->count() }}</span>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{ route('reservation.last') }}" class="dropdown-item">
                                                <i class="fas fa-envelope mr-2"></i>Новые записи:
                                                {{ $lastReservations->count() }}
                                            </a>
                                        @else
                                        <span class="dropdown-item dropdown-header">Нет новых уведомлений</span>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <a href="{{ route('reservation.create') }}" class="btn btn-primary">Добавить</a>
                            </div>

                            <form action="{{ route('reservation.search') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <label for="query">Поиск по дате</label>
                                <div class="form-group">
                                    <input type="text" name="query" id="query" class="form-control"
                                        placeholder="дд-мм-гггг" onchange="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Поиск">
                                </div>
                            </form>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Дата</th>
                                        <th>Время</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->id }}</td>
                                            <td><a
                                                    href="{{ route('reservation.show', $reservation->id) }}">{{ $reservation->date }}</a>
                                            </td>
                                            <td>{{ $reservation->time }}:00</td>
                                        </tr>
                                    @endforeach
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
