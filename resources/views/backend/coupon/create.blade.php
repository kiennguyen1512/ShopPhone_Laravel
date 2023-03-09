@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <div class="card-header py-3">
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Khuyến mãi</a></li>
            <li class="breadcrumb-item active">Tạo mới</li>
        </ol>
    </div>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('coupon.store')}}">
        {{csrf_field()}}
        <div class="form-group">
        <label for="inputTitle" class="col-form-label">Tên Khuyến Mãi<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="tenkm" placeholder="Enter Coupon Code"  value="{{old('tenkm')}}" class="form-control">
        @error('tenkm')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Mã Giảm Giá<span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="code" placeholder="Mã giảm giá"  value="{{old('code')}}" class="form-control">
          @error('code')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Mô tả</label>
          <textarea class="form-control" id="summary" name="mota">{{old('mota')}}</textarea>
          @error('mota')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Hình ảnh</label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i>Chọn ảnh
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Giá Khuyến Mãi<span class="text-danger">*</span></label>
            <input id="inputTitle" type="number" name="giamgia" placeholder="Enter Coupon value"  value="{{old('value')}}" class="form-control">
            @error('value')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
          <label for="" class="col-form-label">Ngày Bắt Đầu</label>
          <input class="form-control" type="datetime-local" id="birthdaytime" name="ngaybd" value="{{old('ngaybd')}}">
          @error('ngaybd')
          <span class="text-danger">{{$message}}</span>  
          @enderror
        </div>
        <div class="form-group">
          <label for="" class="col-form-label">Ngày Kết Thúc</label>
          <input class="form-control" type="datetime-local" id="birthdaytime" name="ngaykt" value="{{old('ngaykt')}}">
          @error('ngaykt')
          <span class="text-danger">{{$message}}</span>  
          @enderror
        </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
          <select name="trangthai" class="form-control">
              <option value="1">Hoạt Động</option>
              <option value="0">Không Hoạt Động</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Làm mới</button>
           <button class="btn btn-success" type="submit">Lưu</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
<script>
  $('#lfm').filemanager('image');

  $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Mô tả về chương trình khuyến mãi.....",
        tabsize: 2,
        height: 120
    });
  });
</script>
@endpush
