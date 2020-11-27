@if(isset($data))
<table class="table align-items-center table-flush" id="table">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>ảnh</th>
            <th class="w-250">giá gốc</th>
            <th class="w-250">khuyến mãi</th>
            <th class="w-250">giá cuối cùng</th>
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
                {{ $value->name }}
            </td>
            <td>
                <span class="design"
                    style="background:url({{asset($value->image_url)}}) no-repeat center center;"></span>
            </td>
            <td>
                {{ $value->price }} VND
            </td>
            <td>
                {{ $value->discount_percent }} %
            </td>
            <td>
                {{ $value->final_amount }} VND
            </td>
            <td>
                <div class="flex">
                    <a href="javascript:void(0)" class="btn btn-primary mr-2"
                        onClick="editProduct(event, {{ $value->id }})">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-danger" onClick="deleteProduct({{ $value->id }})">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7" class="text-center">
                không có dữ liệu
            </td>
        </tr>
        @endif
    </tbody>
</table>
@endif