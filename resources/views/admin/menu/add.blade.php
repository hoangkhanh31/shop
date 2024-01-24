@extends('admin.main')

@section('head')
{{-- CKEDITOR 4 --}}
<script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
{{-- <script src="/ckeditor/ckeditor.js"></script> --}}
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Tên Danh Mục</label>
            <input type="text" name="name" class="form-control" id="menu" placeholder="Nhập tên danh mục">
        </div>

        <div class="form-group">
            <label for="parent_id">Danh Mục</label>
            <select class="form-control" name="parent_id" id="parent_id">
                <option value="0">Danh Mục Cha</option>
                @foreach ($menus as $menu )
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Mô Tả</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>

        <div class="form-group">
            <label for="content">Mô Tả Chi Tiết</label>
            <textarea class="form-control" name="content" id="content"></textarea>
        </div>

        <div class="form-group">
            <label for="">Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
{{-- CKEDITOR 4 --}}
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection