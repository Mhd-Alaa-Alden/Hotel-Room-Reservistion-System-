@include('head')

<body class="bg-light">

    <!-- <div class="content"> -->


    <div class="container-fluid px-lg-4 mt-4">

        <div class="landing-page">
            <div class="overlay"></div>
            <div class="text">
                <img class="logo" src="{{ asset('img/favicon/logo_white.png') }}" alt="">
                <h1 style="color: white;"> We Are <span>Creative</span> space </h1>
                <p style="color: #FFD700" id="welcomeText"></p>
            </div>
        </div>
    </div>

    <!-- Our Rooms -->
    <div class="row pt-1 pb-5">

        <div class="main-title text-center pt-5 pb-2   position-relative ">
            <h2 class="h-font">OUR ROOMS</h2>
            <p class="text-black-50 text-uppercase"> New Story</p>
        </div>


        <div class="container pt-4 pe-2 me-2 d-flex justify-content-center d-inline-block">
            <div class="row" style="width: 90%;">

                @php
                    $availableRooms = \App\Models\Rooms::where('avaiablity', 'Avaiable')
                        ->inRandomOrder()
                        ->limit(3)
                        ->get();
                @endphp

                @foreach ($availableRooms as $room)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="../storage/uploadimg/{{ $room->filename }}" alt="{{ $room->name }}"
                                class="card-img-top shadow-down"
                                style="object-fit: cover; height: 300px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $room->name }}</h5>
                                <p class="card-text">
                                    <strong>Bed Rooms:</strong> {{ $room->bedRooms }}<br>
                                    <strong>Bath Rooms:</strong> {{ $room->bathRooms }}<br>
                                    <strong>Area:</strong> {{ $room->area }} sq. ft.<br>
                                    <strong>Floor:</strong> {{ $room->floor }}<br>
                                    <strong>Price:</strong> ${{ $room->price }}
                                </p>
                                <!-- Add any other details you want to display -->

                                <!-- Example: Add a link to view more details -->
                                <a href="{{ route('book.store', ['room_id' => $room->id]) }}"
                                    class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>






        <div class="d-flex justify-content-center pb-5 container">
            <a class="btn btn-outline-dark main-btn btn text-center fw-bold h-font"
                href="{{ route('rooms.index') }}">More Rooms>> </a>
        </div>


        <!-- Start Swipr Sliders -->
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <img src="./img//photos/select/ban.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="./img//photos/select/hotel3.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="./img//photos/select/suproom.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="./img//photos/select/suproom1.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="./img//photos/select/banquet.jpeg" />
                </div>
                <div class="swiper-slide">
                    <img src="./img//photos/select/hotel1.jpg" />
                </div>
                <div class="swiper-slide ">
                    <img src="./img/photos/3.png" />
                </div>

                <div class="swiper-slide ">
                    <img src="./img/photos/2.png" />
                </div>
                <div class="swiper-slide">
                    <img src="./img/photos/1.png" />
                </div>
                <div class="swiper-slide">
                    <img src="./img//photos/select/suproom2.jpg" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- End Swiper Sliders -->


        <!-- start script for search Hotel -->


        <!-- Contact Us -->

        <!-- ***** Header Area End ***** -->

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

        <!-- Start Footer -->
       @include('footer')
        <!-- End Footer -->


        <!-- --------------------------------------------------------------------------------------------------------- -->
        <!-- Script for Swiper Sliders -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- Script for library Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

        <!--Script for Text auto -->
        <script>
            const welcomeText = document.getElementById('welcomeText');
            // const spanText = document.getElementById('spanText');
            const text = "Welcome to ANS Hotel";
            // const span = "We Are Creative space";
            let index = 0;

            function typeWriter() {
                if (index < text.length) {
                    welcomeText.textContent += text.charAt(index);
                    index++;
                    setTimeout(typeWriter, 200);
                } else {
                    index = 0;
                    welcomeText.textContent = "";
                    setTimeout(typeWriter, 900);
                }
            }
            typeWriter();
            // ----------------------------------------

            //  Script For Landing Slider Auto 
            // start let landing
            let landing = document.querySelector(".landing-page");

            // Get Array  of images
            let Arrayimages = ["1.png", "2.png", "3.png"];

            setInterval(() => {
                // get random number
                let randomNumber = Math.floor(Math.random() * Arrayimages.length);

                // change background image url
                landing.style.backgroundImage = 'url("../img/photos/' + Arrayimages[randomNumber] + '")';
            }, 2000);
        </script>

        <!-- Script For Slider js -->
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                },
            });
        </script>

</body>

</html>
