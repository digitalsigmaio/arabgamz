@extends('layouts/master')





@section('portfolio')


<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Portfolio</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/01-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Threads</h4>
                    <p class="text-muted">Illustration</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/02-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Explore</h4>
                    <p class="text-muted">Graphic Design</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/03-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Finish</h4>
                    <p class="text-muted">Identity</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Lines</h4>
                    <p class="text-muted">Branding</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/05-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Southwest</h4>
                    <p class="text-muted">Website Design</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/06-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Window</h4>
                    <p class="text-muted">Photography</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Portfolio Modals -->

<!-- Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Date: January 2017</li>
                                <li>Client: Threads</li>
                                <li>Category: Illustration</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Date: January 2017</li>
                                <li>Client: Explore</li>
                                <li>Category: Graphic Design</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3 -->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Date: January 2017</li>
                                <li>Client: Finish</li>
                                <li>Category: Identity</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4 -->
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Date: January 2017</li>
                                <li>Client: Lines</li>
                                <li>Category: Branding</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 5 -->
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Date: January 2017</li>
                                <li>Client: Southwest</li>
                                <li>Category: Website Design</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 6 -->
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Date: January 2017</li>
                                <li>Client: Window</li>
                                <li>Category: Photography</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Subscribe Modal -->

<div class="portfolio-modal modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Subscribe Details Go Here -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="contactForm" name="sentMessage" novalidate>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" id="number" name="number" type="text" placeholder="Your Number *" required data-validation-required-message="Please enter your number.">
                                                    <p class="help-block text-danger text-left"></p>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" id="password" type="password" name="password" placeholder="Your Password *" required data-validation-required-message="Please enter your password.">
                                                    <p class="help-block text-danger text-left"></p>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" id="passwordConfirmation" name="password_confirmation" type="password" placeholder="Confirm Password *" required data-validation-required-message="Please confirm your password.">
                                                    <p class="help-block text-danger text-left"></p>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                            <div class="col-lg-12 text-center">
                                                <div id="success"></div>
                                                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Subscribe</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection