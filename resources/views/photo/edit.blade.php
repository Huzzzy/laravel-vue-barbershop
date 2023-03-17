@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать фото</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Редактировать фото</li>
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
                <form action="{{ route('photo.update', $photo->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <input type="text" value="{{ old('title', $photo->title) }}" name="title" class="form-control"
                            placeholder="Наименование">
                    </div>

                    <div class="form-group">
                        <h4>Текущее фото:</h4>
                        <img src="{{ $photo->imageUrl }}" alt="{{ $photo->name }}">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="file_path" type="file" class="custom-file-input">
                                <label class="custom-file-label">Выберите фото</label>
                            </div>
                        </div>
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
