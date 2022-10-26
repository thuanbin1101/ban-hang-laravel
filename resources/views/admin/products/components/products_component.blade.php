@foreach($products as $each)
    <tr>
    <td>{{$each->id}}</td>
    <td class="">
        <img width="150px" height="150px" src="{{asset($each->feature_image_path)}}" alt="">
    </td>
    <td class="table-user">
        {{$each->name}}
    </td>
    <td class="">
        {{number_format($each->price ). " VNĐ"}}
    </td>
    <td class="">
        {{optional($each->category)->name}}
    </td>
    <td class="table-action">
        <a href="{{route('products.edit',$each->id)}}" class="action-icon"> <i
                class="mdi mdi-pencil"></i></a>
        <form style="display: inline" id="my_form" action="{{route('products.destroy',$each->id)}}"
              method="POST">
            @method("DELETE")
            @csrf
            <a href="javascript:{}" data-url="{{route('products.destroy',$each->id)}}"
               class="action-icon product-delete"> <i class="mdi mdi-delete"></i></a>
        </form>
    </td>
</tr>
@endforeach
