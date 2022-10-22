@foreach($products as $each)
    @csrf
    <tr>
        <td class="align-middle"><img src="{{asset($each->feature_image_path)}}" alt=""
                                      style="width: 50px;height: 50px;">
            {{$each->name}}
        </td>
        <td class="align-middle">{{number_format($each->price)}} VNĐ</td>
        <td class="align-middle">
            <div class="input-group quantity mx-auto" style="width: 100px;">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-primary btn-minus">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" name="quantity[{{$each->id}}]"
                       class="form-control form-control-sm bg-secondary text-center"
                       value="{{$carts[$each->id]}}">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-primary btn-plus">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </td>
        <td class="align-middle">{{number_format($each->price * $carts[$each->id])}}VNĐ
        </td>
        <td class="align-middle">
            <button type="button" data-id="{{$each->id}}"
                    class="delete_cart btn btn-sm btn-primary"><i class="fa fa-times"></i>
            </button>
        </td>
    </tr>
@endforeach
