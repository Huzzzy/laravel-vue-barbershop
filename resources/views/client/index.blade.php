@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Клиенты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Клиенты</li>
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
                        <div class="card-header w-50">
                            <div class="mt-3">
                                <a href="{{ route('client.create') }}" class="btn btn-primary">Добавить</a>
                            </div>
                            <form action="{{ route('client.search') }}" method="post" class="mt-3" enctype="multipart/form-data">
                                @csrf
                                <label for="query">Поиск по email</label>
                                <div class="form-group">
                                    <input type="text" name="query" id="query" class="form-control"
                                        placeholder="ivanov@email.com">
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
                                        <th>Имя</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $client->id }}</td>
                                            <td><a
                                                    href="{{ route('client.show', $client->id) }}">{{ $client->name }}</a>
                                            </td>
                                            <td>{{ $client->email }}</td>
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
