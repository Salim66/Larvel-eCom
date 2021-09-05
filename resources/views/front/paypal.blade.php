

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="sb-5ehm87019775@business.example.com">

    <?php $count = 0; ?>

    @foreach($cartItems as $cartItem)

    <?php $count++; ?>

    <input type="text" name="item_name_{{ $count }}" value="{{ $cartItem->name }}">
    <input type="text" name="item_number{{ $count }}" value="{{ $cartItem->id }}">
    <input type="text" name="amount_{{ $count }}" value="{{ $cartItem->price }}">
    <input type="text" name="quantity_{{ $count }}" value="{{ $cartItem->qty }}">
    <input type="text" name="shipping_{{ $count }}" value="1.75">
    <input type="text" name="tax_{{ $count }}" value="0.12">

    @endforeach


    <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
</form>
