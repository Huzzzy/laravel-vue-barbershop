@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $master->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{ $master->name }}</li>
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
                                <a href="{{ route('master.edit', $master->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <div class="mr-2">
                                <form action="{{ route('master.delete', $master->id) }}" method="post">
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
                                        <td>{{ $master->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Имя</th>
                                        <td>{{ $master->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Описание</th>
                                        <td>{!! $master->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Фото</th>
                                        <td><img src="{{ $master->imageUrl }}" alt="{{ $master->name }}"></td>
                                    </tr>
                                    <tr>
                                        <th>Рабочие дни</th>
                                        <td>
                                            @foreach ($master->available_days as $day)
                                                <div>{{ $day }}</div>
                                            @endforeach
                                        </td>
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
