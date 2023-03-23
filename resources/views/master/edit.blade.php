@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать мастера</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Редактировать мастера</li>
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
                <form action="{{ route('master.update', $master->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <input type="text" value="{{ old('name', $master->name) }}" name="name" class="form-control"
                            placeholder="Имя">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Описание">{{ old('description', $master->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h4>Текущее фото:</h4>
                        <img src="{{ $master->imageUrl }}" alt="{{ $master->name }}">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="photo" type="file" class="custom-file-input">
                                <label class="custom-file-label">Выберите фото</label>
                            </div>
                        </div>
                        @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <h4>Текущие рабочие дни:</h4>
                        @foreach ($master->available_days as $day)
                            <div>{{ $day }}</div>
                        @endforeach
                        <div class="input-group date" id="datetimepicker-edit" data-target-input="nearest">
                            <input name="available_days" type="text" placeholder="Рабочие дни" class="form-control datetimepicker-input"
                                data-target="#datetimepicker-edit" />
                            <div class="input-group-append" data-target="#datetimepicker-edit" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('available_days')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
