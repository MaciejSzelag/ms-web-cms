<?php $tabTitle="Home page"; include "includes/head.php"; ?>

<div class="contact-page">

    <div class="contact-wrap">
        <div class="contact title">
            <h1>Let's <span>talk</span></h1>
            <p>Do you have any questions about cooperation with me? Or maybe you would like to quote your order for
                free? Please contact me and I will provide you with comprehensive information.</p>

        </div>
        <div class="contact text-form">
            <div class="box-contact">
                <div class="box-contact-content">
                    <h3>Email:</h3>
                    <a href="mailto:szelag.maciej@gmail.com"><i class="fas fa-at"></i> <span> szleg.maciej@gmail.com</span></a>
                </div>
                <div class="box-contact-content">
                    <h3>Phone:</h3>
                    <a href="tel:077777777"><i class="fas fa-mobile-alt"></i> <span> +44 7741 12453</span></a>
                </div>
            </div>
            <div class="box-contact-form">
                <form action="">
                    <h1>Contact form</h1>
                    <!-- Category -->
                    <div class="input-group">
                        <div class="label-wrap">
                            <label for="">Category</label>
                        </div>
                        <div class="input-wrap">
                            <select name="" id="">
                                <option value="">Select category</option>
                                <option value="">One page</option>
                                <option value="">Single page</option>
                                <option value="">One page + CMS</option>
                                <option value="">Single page + CMS</option>
                                <option value="">Other</option>
                            </select>
                        </div>
                    </div>
                    <!-- Category -->
                    <!-- name -->
                    <div class="input-group">
                        <div class="label-wrap">
                            <label for="">Name</label>
                        </div>
                        <div class="input-wrap">
                            <input type="text" name="client_name"placeholder="Name" required>
                        </div>
                    </div>
                    <!-- name -->
                    <!-- phone number -->
                    <div class="input-group">
                        <div class="label-wrap">
                            <label for="">Phone number</label>
                        </div>
                        <div class="input-wrap">
                            <input type="number" name="client_phone" placeholder="Phone number" required>
                        </div>
                    </div>
                    <!-- phone number -->
                    <!-- email -->
                    <div class="input-group">
                        <div class="label-wrap">
                            <label for="">E-mail</label>
                        </div>
                        <div class="input-wrap">
                            <input type="text" name="client_name" placeholder="e-mail" required> 
                        </div>
                    </div>
                    <!-- email -->
                    <!-- textarea -->
                    <div class="input-group">
                        <div class="label-wrap">
                            <label for="">Message</label>
                        </div>
                        <div class="input-wrap">
                            <textarea name="client_message" id="" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                    <!-- text area -->
                    <!-- submit -->
                    <div class="input-group">

                        <div class="input-wrap">
                            <input type="submit">
                        </div>
                    </div>
                    <!-- submit -->
                </form>
            </div>
        </div>


    </div>


</div>



<?php include "includes/footer.php"; ?>
<script src="js/main.js"></script>
</body>

</html>
