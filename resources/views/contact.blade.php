<!-- Contact -->
<section id="contact" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">تواصل معنا</h2>
                <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="contactForm" name="sentMessage" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="أسمك *" required data-validation-required-message=".من فضلك أدخل أسمك">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password" name="password" type="password" placeholder="كلمة السر *" required data-validation-required-message="من فضلك أدخل كلمة السر.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="passwordConfirmation" name="password_confirmation" type="password" placeholder="تأكيد كلمة السر *" required data-validation-required-message="من فضلك تأكيد كلمة السر.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="رسالتك *" required data-validation-required-message="من فضلك أدخل رسالتك"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">أرسل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>