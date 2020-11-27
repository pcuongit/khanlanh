@if(isset($data))
<table class="table align-items-center table-flush" id="table">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>email</th>
            <th>sản phẩm</th>
            <th class="w-250">tổng hóa đơn</th>
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
                {{ $value->email }}
            </td>
            <td>
                @php
                $jsonDecode = json_decode($value->ids_product);
                $ids_product = $jsonDecode->products;
                @endphp
                @foreach($ids_product as $key => $product)
                @php
                $detail = \App\Models\Product::where('id', $product->product_id)->first();
                @endphp
                @if($key

                < 5) <button type="button" class="btn btn-outline-primary mb-1">{{$detail->name}}
                    x{{$product->number}}</button>
                    @endif
                    @if($key == 5)
                    <button type="button" class="btn btn-outline-light mb-1">...</button>
                    @endif
                    @if($key > 5)
                    @php
                    return false;
                    @endphp
                    @endif
                    @endforeach
            </td>
            <td>
                {{ $value->total_bill }} VNĐ
            </td>
            <td>
                <a href="javascript:void(0)" class="btn btn-primary pl-3 pr-3"
                    onClick="information(event, {{ $value->id }})">
                    <i class="fas fa-info"></i>
                </a>
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