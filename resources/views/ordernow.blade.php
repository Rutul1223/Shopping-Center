@extends('master')
@section("content")

<div class="container custom-product">
    <div class="col-sm-12 col-md-8">
        <table class="table">
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>Rs. {{ $total }}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>Rs. 0</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>Rs. 10</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>Rs. {{ $total + 10 }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-sm-12 col-md-4">
        <form action="/orderplace" method="POST" id="payment-form">
            @csrf
            <div class="form-group">
                <textarea type="address" name="address" placeholder="Enter your Address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label><br><br>
                <!-- Add a hidden input for the payment method -->
                <input type="hidden" id="payment_method" name="payment_method">
                <div id="payment-method"></div>
            </div>
            <button type="submit" class="btn btn-default" id="order-btn">Order Now</button>
        </form>
    </div>
</div>

<!-- Include Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var stripe = Stripe('pk_test_51OqwLySI4aPAHeUumZcLsRWLiwMylc3WYaHCDwM5lATPeUK79CbQnLu9kbwJ8l4hz9nyXYmerURBwr7CixBcxsgF00lzzNd6MD'); // Replace with your actual publishable key

        // Create an instance of Elements
        var elements = stripe.elements();

        // Create an instance of the card Element
        var card = elements.create('card');

        // Add an instance of the card Element into the `payment-method` div
        card.mount('#payment-method');

        // Handle form submission
        var form = document.getElementById('payment-form');
        var orderBtn = document.getElementById('order-btn');
        var paymentMethodInput = document.getElementById('payment_method');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Disable the Order Now button to prevent multiple submissions
            orderBtn.disabled = true;

            // Create a token or trigger the payment process
            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error
                    alert(result.error.message);
                    orderBtn.disabled = false;
                } else {
                    // Token is created, add it to the form and submit
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);

                    // Set the payment method in the hidden input
                    paymentMethodInput.value = 'Stripe ' + result.token.card.brand + ' ' + result.token.card.last4;

                    // Submit the form
                    form.submit();
                }
            });
        });
    });
</script>

@endsection
