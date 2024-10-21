@include('head')

<body>

    <!-- ***** Header Area End ***** -->

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span><a href="{{ route('home') }}">Home</a> / Contact Us</span>
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-page section mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6>| Contact Us</h6>
                        <h2>Get In Touch With Our Agents</h2>
                    </div>
                    <p> </p>
                    <div class="col-lg-12">
                        <div class="item phone">
                            <img src="img/phone-icon.png" alt="" style="max-width: 30px;">
                            <h6>0934442050<br><span>Phone Number</span></h6>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="item email">
                            <img src="{{ asset('img/favicon/email-icon.png') }}" alt=""
                                style="max-width: 30px;">
                            <h6>ANS-hotel@gmail.com<br><span>Business Email</span></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form id="contact-form" action="{{ route('contact.submit') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="name">Full Name</label>
                                    <input type="name" name="name" id="name" placeholder="Your Name..."
                                        autocomplete="on" required>
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your E-mail..." required="">
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="subject">Subject</label>
                                    <input type="subject" name="subject" id="subject" placeholder="Subject..."
                                        autocomplete="on">
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Send
                                        Message</button>
                                </fieldset>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-12">
                <div id="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106582.86313516543!2d36.341712361404355!3d33.40461262771994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1519187a6ec47073%3A0xbecc8f0470798ea!2z2KfZhNis2KfZhdi52Kkg2KfZhNiz2YjYsdmK2Kkg2KfZhNiu2KfYtdipINmE2YTYudmE2YjZhSDZiNin2YTYqtmD2YbZiNmE2YjYrNmK2Kc!5e0!3m2!1sar!2snl!4v1703422780772!5m2!1sar!2snl"
                        width="100%" height="500px"
                        style="border:0;  border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
        </div>
    </div>

        @include('footer')

</body>
