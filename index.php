<?php
include 'variables.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://secure.networkmerchants.com/token/Collect.js"
        data-tokenization-key="00000000-000000-000000-000000000000" data-variant="inline"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Checkout</title>
    <link rel="shortcut icon" href="./images/fav.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-2">
                    <img src="./images/new_logo.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-2">
                    <a href="tel:<?php echo $number; ?>"><img src="./images/call.png" width="20" height="20"
                            class="img-fluid" alt=""><?php echo $number; ?></a>
                </div>
            </div>
        </div>
    </header>
    <section class="cc_form_wrap">
        <div class="container">
            <div class="row cc_form_row flex-lg-row flex-column-reverse">
                <div class="col-lg-8">
                    <form class="cc_form" id="cc_form" action="process_form.php" method="POST"
                        data-tokenization-key="00000000-000000-000000-000000000000">
                        <div class="cc_heading">
                            <span class="desktop-num">1</span>
                            <h2>Billing Information</h2>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="tel" name="phone" id="phone" class="form-control w-100"
                                        placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input type="text" name="address" class="form-control" placeholder="Address"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="CompanyName" class="form-control"
                                        placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select name="country" id="country" class="form-control country" required
                                        autocomplete="country">
                                        <option value="">Select Your Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="state" class="form-control" placeholder="State" required>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="City" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="zip_code" class="form-control" placeholder="Zip Code"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="cc_heading mt-3">
                            <span class="desktop-num">2</span>
                            <h2>Payment Information</h2>
                        </div>
                        <div class="card_area">
                            <img src="./images/cc.png" class="img-fluid" alt="">
                            <input data-nmi="ccnumber" type="text" name="ccnumber" class="cc_number" id="ccnumber"
                                placeholder="Card Number" required>
                            <input data-nmi="ccexp" type="text" name="ccexp" class="cc_date" id="ccexp"
                                placeholder="MM/YY" required>
                            <input data-nmi="cvv" type="text" name="cvv" class="cc_cvc" id="cvv" placeholder="CVV"
                                required>
                        </div>
                        <button type="submit" id="payButton" class="form-submit">Pay Now</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="cc_info">
                        <div class="cc_heading">
                            <span class="desktop-num">3</span>
                            <h2>Billing Invoice</h2>
                        </div>
                        <ul class="packageDetails">
                            <li>
                                <h5>Essential Branding</h5>
                            </li>
                            <li>
                                <span class="thickfont">Item Price</span>
                                <b>USD 139</b>
                            </li>
                            <li>
                                <span>Total (USD)</span>
                                <strong>USD 139</strong>
                            </li>
                        </ul>
                        <div class="coupon-div">
                            <div class="input-group">
                                <input type="text" class="form-control coupon-code" placeholder="Promo code">
                                <div class="input-group-append">
                                    <button type="button" id="" class="btn btn-secondary apply-coupon">Redeem</button>
                                </div>
                            </div>
                            <div class="coupon-response-div"></div>
                        </div>
                        <div class="complete">
                            <img class="img-fluid" src="./images/bill_1.jpg" alt="moneyback">
                            <img class="img-fluid" src="./images/bill_2.png" alt="moneyback">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- <script src="https://secure.nmi.com/token/Collect.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Include jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
    integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="./js/cleave.min.js"></script>
<script src="./js/countries.js"></script>
<script src="./js/function.js"></script>

</html>