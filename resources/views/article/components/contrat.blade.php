<div class="py-7">
    
    <div class="example-preview">
        <div class="row">
            <div class="col-3">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" id="home-tab-5" data-toggle="tab" href="#home-5">
                            <span class="nav-icon">
                                <i class="fa fa-file-pdf"></i>
                            </span>
                            <span class="nav-text">Contrats</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link " id="profile-tab-5" data-toggle="tab" href="#profile-5" aria-controls="profile">
                            <span class="nav-icon">
                                <i class="flaticon2-layers-1"></i>
                            </span>
                            <span class="nav-text">Visites</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab-5" data-toggle="tab" href="#contact-5" aria-controls="contact">
                            <span class="nav-icon">
                                <i class="fa fa-eye"></i>
                            </span>
                            <span class="nav-text">Consultations</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <div class="tab-content" id="myTabContent5">
                    <div class="tab-pane fade active show" id="home-5" role="tabpanel" aria-labelledby="home-tab-5">
                        @include("article.components.contrat-tab", compact("article"))

                    </div>
                    <div class="tab-pane fade " id="profile-5" role="tabpanel" aria-labelledby="profile-tab-5">
                        <h1>Profile</h1>

                    </div>
                    <div class="tab-pane fade" id="contact-5" role="tabpanel" aria-labelledby="contact-tab-5">Contact</div>
                </div>
            </div>
        </div>
    </div>




</div>