@extends('interface.layout.layout')
@section('title', 'Card')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@section('card')
    <div class="container mx-auto my-10">
        <section>
            <h1 class="text-xl">Grand Total: Rs{{ $total }}</h1>

            <div class="container px-5 py-24 mx-auto flex flex-wrap lg:flex-row flex-col lg:space-y-0 space-y-4">

                <div class="lg:w-3/5 md:w-full md:pr-16 lg:pr-0 pr-0 bg-gray-900 rounded-md lg:self-start">
                    @foreach ($items as $item)
                        <div class="flex justify-between items-center bg-gray-800 m-3 p-2">
                            <div>
                                <img src="{{ asset('product-images/' . $item->product->image->path) }}" alt="product-item"
                                    class="w-24 h-24 pb-2">
                                <button class="bg-yellow-500 m-1 px-2 rounded hover:bg-yellow-600" id="csub">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 12H6" />
                                    </svg>
                                </button>
                                <button class="bg-yellow-500 m-1 px-2 rounded hover:bg-yellow-600" id="cadd">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </button>
                                <form action="{{route('itemdel',$item->id)}}" method="get" class="inline">
                                    <button class="bg-red-700 m-1 px-2 rounded hover:bg-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                                
                            </div>

                            <div class="text-white">
                                <p>Name: {{ $item->product->name }}</p>
                                <p>Price: Rs150.0</p>
                                <p>Quantity: <input type="text" value="1" class="w-10 h-5 bg-gray-800 outline-none"
                                        id="quantity" readonly></p>
                                <p>Total: 150.0</p>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="lg:w-2/6 md:w-full bg-gray-900 rounded-lg p-8 flex flex-col lg:ml-auto w-full mt-10 md:mt-0">
                    <h2 class="text-white text-lg font-medium title-font mb-5">Address</h2>

                    <form action="" method="POST" id="address">
                        @csrf
                        <div class="relative mb-4">
                            <label for="country" class="leading text-sm text-white">Country</label>
                            <input type="text" id="country" name="country" placeholder="Country" autocomplete="off"
                                @isset($address) value="{{ $address->country }}" @endisset
                                class="w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-800 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('country')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="relative mb-4">
                            <label for="city" class="leading text-sm text-white">City</label>
                            <input type="text" id="city" name="city" placeholder="City" autocomplete="off" @isset($address)
                                value="{{ $address->city }}" @endisset
                                class="w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-800 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('city')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="relative mb-4">
                            <label for="address" class="leading text-sm text-white">Address</label>
                            <input type="text" id="address" name="address" placeholder="Address" autocomplete="off"
                                @isset($address) value="{{ $address->address }}" @endisset
                                class="w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-800 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('address')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="relative mb-4">
                            <label for="phone_number" class="leading text-sm text-white">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number"
                                autocomplete="off" @isset($address) value="{{ $address->phone }}" @endisset
                                class="w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-800 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('phone_number')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="relative mb-4">
                            <label for="gender" class="leading text-sm text-white">Gender</label>
                            <select name="gender" id="gender"
                                class="w-full bg-gray-700 rounded border-gray-600 focus:bg-gray-800 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="option" selected disabled>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                @isset($address)
                                    <option value="{{ $address->gender }}" selected>{{ $address->gender }}</option>
                                @endisset
                            </select>
                            @error('gender')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="submit" value="Save"
                            class="cursor-pointer text-white w-full bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg" @isset ($address) disabled @endisset>
                        <p class="text-xs text-gray-500 mt-3">Please enter the valid address thank you</p>
                    </form>
                </div>

            </div>


            <button class="modal-open block font-bold py-2 px-4 bg-indigo-700 rounded w-full">Check Out</button>

            <!--Modal-->
            <div
                class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                <div class="modal-container bg-gray-800 w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                    <div
                        class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                        <span class="text-sm">(Esc)</span>
                    </div>

                    <div class="modal-content py-4 text-left px-6">

                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">Payment</p>
                            <div class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
  
                        <form role="form" action="{{ route('stripepayment') }}" method="POST" class="validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf

                            <div>
                            <label class="block">Name on Card</label>
                            <input name="name" autocomplete="off" class='w-full class="w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-900 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"' size='4' type='text'>
                            </div>

                            <div>
                            <label class="block">Card Number</label>
                            <input name="number" autocomplete='off' class="w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-900 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out card-num" size='4' type='text'  size='20' type='text'>
                            </div>

                            <div>
                            <label class='block'>CVC</label>
                            <input name="cvc" autocomplete='off' class='w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-900 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out card-cvc' placeholder='e.g 415' size='4'type='text'>
                            </div>

                            <div>
                            <label class='block'>Expiration Month</label>
                            <input name="month" class='w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-900 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>

                            <div>
                            <label class='block'>Expiration Year</label> 
                            <input name="year" class='w-full bg-gray-700 rounded focus:border-gary-600 focus:bg-gray-900 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>

                            <div class='text-red-600 text-sm'>Fix the errors before you begin.</div>

                            <button class="bg-indigo-700 hover:bg-indigo-900 p-2 rounded" type="submit">Pay Now</button>

                        </form>
                        
                    </div>
                </div>
            </div>

        </section>
    </div>

    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {
            var $form         = $(".validation");
          $('form.validation').bind('submit', function(e) {
            var $form         = $(".validation"),
                inputVal = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=file]',
                                 'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),
                valid         = true;
                $errorStatus.addClass('hide');
         
                $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorStatus.removeClass('hide');
                e.preventDefault();
              }
            });
          
            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-num').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeHandleResponse);
            }
          
          });
          
          function stripeHandleResponse(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
          
        });
    </script>

    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function(event) {
                event.preventDefault()
                toggleModal()
            })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };


        function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }

    </script>
    
@endsection
