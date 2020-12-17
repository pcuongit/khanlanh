@if(isset($data))
<table class="table align-items-center table-flush" id="table">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>ảnh</th>
            <th>hành động</th>
        </tr>
    </thead>
    <tbody>
        @if($data->count() > 0)
        @foreach($data as $key => $value)
        <tr class="form_{{$value->id}}">
            @csrf
            <input type="hidden" name="id" value="{{ $value->id }}" />
            <td>
                {{ $value->id }}
            </td>
            <td>
                <span class="text_default_{{$value->id}}">{{ $value->name }}</span>
                <input type="text" name="name_cate" class="form-control hidden input_edit_{{$value->id}}"
                    value={{ $value->name }} />
            </td>
            <td>
                <div class="row">
                    <span class="design"
                        style="background:url({{asset($value->image_url)}}) no-repeat center center;width: 204px;height: 388px;"></span>
                </div>
                <div class="row hidden input_edit_{{$value->id}}">
                    <div class="custom-file w-250 mt-2">
                        <input type="file" class="custom-file-input" id="customFile" name="image_url"
                            accept="image/png,image/jpg,image/svg">
                        <label class="custom-file-label" for="customFile">chọn ảnh</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="flex">
                    <a href="javascript:void(0)" class="btn btn-success btn_update mr-2 hidden"
                        onClick="updateCate(event, {{ $value->id }})">
                        <i class="fas fa-check"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-warning btn_cancel mr-2 hidden"
                        onClick="cancelCate(event, {{ $value->id }})">
                        <i class="fas fa-times"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-primary mr-2 btn_edit"
                        onClick="editCate(event, {{ $value->id }})">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-danger btn_delete"
                        onClick="deleteCate({{ $value->id }})">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4" class="text-center">
                không có dữ liệu
            </td>
        </tr>
        @endif
    </tbody>
</table>
@endif