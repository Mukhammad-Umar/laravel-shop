
@foreach($carts as $cart)
    <tr class="rem1">
        <td class="invert">1</td>
        <td class="invert-image"><a href=""><img src="{{ asset('public/images/' . $cart->image)}}" alt=" " class="img-responsive"></a></td>
        <td class="invert">
            <div class="quantity">
                <div class="quantity-select">
                    <div class="entry value-minus">&nbsp;</div>
                    <div class="entry value"><span>1</span></div>
                    <div class="entry value-plus active">&nbsp;</div>
                </div>
            </div> 
        </td>
        <td class="invert">{{$cart->name}}</td>
        <td class="invert">${{$cart->price}}</td>
        <td class="invert">
            <button type="button" class="btn btn-danger listbuttonremove" id="{{$cart->id}}">
            <i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </td>
    </tr>
@endforeach