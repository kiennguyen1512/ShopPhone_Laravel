@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <div class="card-header py-3">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Khuyến mãi</a></li>
                <li class="breadcrumb-item active">Cập nhật</li>
            </ol>
        </div>
        </div>
    <div class="card-body">
      <form method="post" action="{{route('coupon.update',$coupon->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tên Khuyến Mãi<span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="tenkm" placeholder="Enter Coupon Code"  value="{{$coupon->tenkm}}" class="form-control">
          @error('tenkm')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
  
          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Mã Giảm Giá<span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="code" placeholder="Mã giảm giá"  value="{{$coupon->code}}" class="form-control">
            @error('code')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
  
          <div class="form-group">
            <label for="summary" class="col-form-label">Mô tả</label>
            <textarea class="form-control" id="summary" name="mota">{{$coupon->mota}}</textarea>
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
                <input id="thumbnail" class="form-control" type="text" name="photo"
                    value="{{ $coupon->photo }}">
            </div>
            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            @error('photo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Giá Khuyến Mãi<span class="text-danger">*</span></label>
              <input id="inputTitle" type="number" name="giamgia" placeholder="Enter Coupon value"  value="{{$coupon->giamgia}}" class="form-control">
              @error('value')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Ngày Bắt Đầu</label>
            <input class="form-control" type="datetime-local" id="birthdaytime" name="ngaybd" value="{{$coupon->ngaybd}}">
            @error('ngaybd')
            <span class="text-danger">{{$message}}</span>  
            @enderror
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Ngày Kết Thúc</label>
            <input class="form-control" type="datetime-local" id="birthdaytime" name="ngaykt" value="{{$coupon->ngaykt}}">
            @error('ngaykt')
            <span class="text-danger">{{$message}}</span>  
            @enderror
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
            <select name="trangthai" class="form-control">
                <option value="1" {{ $coupon->status == '1' ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $coupon->status == '0' ? 'selected' : '' }}>Không Hoạt Động</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Cập Nhật</button>
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
    $('#summary').summernote({
      placeholder: "Mô tả về chương trình khuyến mãi.....",
        tabsize: 2,
        height: 150
    });
    });
</script>

@endpush
