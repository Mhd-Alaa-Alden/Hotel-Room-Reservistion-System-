@include('head')
<body class="bg-light">
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Checkout form</h2>
                <p class="lead"> </p>
            </div>

            <div class="col-md-7 col-lg-8">
                <form method="post" action="{{ route('book.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="mb-3">
                            <label class="form-label" for="room_id">Rooms</label>
                            <input type="hidden" name="room_id" id="room_id"
                                value="{{ old('room_id', $selectedRoom ? $selectedRoom->id : '') }}">
                            <input type="text" class="form-control"
                                value="{{ $selectedRoom ? $selectedRoom->name : '' }}" readonly>
                            <div class="text-danger">
                                @error('room_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                                required>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" required>
                                <option value="">Choose...</option>
                                <option>syria</option>
                                <option>dubia</option>
                                <option>usa</option>
                                <option>jordan</option>
                                <option>saudi</option>
                                <option>iraq</option>
                                <option>bahreen</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="note">Additional Notes</label>
                            <textarea name="note" class="form-control" rows="3" placeholder="Additional Notes"></textarea>
                            @error('note')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <hr class="my-4">
                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="form-group">
                        <label for="payment">Payment Method</label>
                        <select name="payment" class="form-control" required>
                            <option value="" disabled selected>Payment Method</option>
                            <option value="credit">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="cash">Cash</option>
                        </select>
                        @error('payment')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <hr class="my-4">

                    {{-- <button class="w-100 btn btn-primary btn-lg" type="submit" onclick="alert('سيتم تأكيد حجزك برسالة على بريدك الإلكتروني')">Continue to checkout</button> --}}
                    <input type="hidden" name="room_name" value="Room Name">

                    <button type="submit" class="btn btn-primary btn-block">Confirm Reservation!</button>

                </form>
            </div>
    </div>
    </main>

    <script>
        const credit = document.getElementById('credit');
        const debit = document.getElementById('debit');
        const creditCardDetails = document.getElementById('creditCardDetails');

        credit.addEventListener('change', function() {
            if (this.checked) {
                creditCardDetails.style.display = 'block';
            } else {
                creditCardDetails.style.display = 'none';
            }
        });

        debit.addEventListener('change', function() {
            if (this.checked) {
                creditCardDetails.style.display = 'none';
            }
        });


        // function confirmBooking() {
        //     // عرض الرسالة
        //     alert('سيتم تأكيد حجزك برسالة على بريدك الإلكتروني');


        //     // توجيه المستخدم إلى الصفحة الرئيسية بعد ظهور الرسالة
        // }
    </script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Script for library Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
   @include('footer')
    </div>

</body>

</html>
