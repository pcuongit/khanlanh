@if(isset($data))
<table class="table align-items-center table-flush" id="table">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>độ ưu tiên</th>
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
                {{ $value->priorty }}
            </td>
            <td>
                <div class="row">
                    <span class="design"
                        style="background:url({{asset($value->image_url)}}) no-repeat center center;"></span>
                </div>
            </td>
            <td>
                <div class="flex">
                    <a href="javascript:void(0)" class="btn btn-primary mr-2 btn_edit"
                        onClick="editBanner(event, {{ $value->id }})">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-danger btn_delete"
                        onClick="deleteBanner({{ $value->id }})">
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