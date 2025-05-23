<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('web/campaign')}}/style.css?{{now()}}" />
    <link rel="stylesheet" href="{{asset('web/campaign')}}/about.css" />
    <link rel="stylesheet" href="{{asset('web/campaign')}}/service.css" />
    <link rel="stylesheet" href="{{asset('web/campaign')}}/footer.css" />

    <meta name="title" content="{{ $campaign->meta_title }}" />
    <meta name="description" content="{{ $campaign->meta_description }}" />
    <title>{{ $campaign->meta_title }}</title>

</head>

<body>
    <!-- -------navbar-start----------------->
    <nav class="navbar">
        <div class="logo">
            <img src="{{asset('web/image')}}/logo.jpeg" alt="logo" style="max-width: 100px;" />
        </div>
        <ul class="nav-links">
            <a href="#about">About us</a>
            <a href="#program">Services</a>
            <a href="#memberships">Chat</a>
            <a href="#schemes">Process</a>
            {{-- <a href="#network">Network</a> --}}
            <a href="#faq">FAQs</a>
        </ul>
        <button class="connect-btn">Connect with us</button>

        <!-- Mobile Menu Icon -->
        <div class="hamburger" onclick="toggleMenu()">
            <i class="fa-solid fa-bars text-dark"></i>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobileMenu">
            <a href="#about" onclick="toggleMenu()">About us</a>
            <a href="#program" onclick="toggleMenu()">Services</a>
            <a href="#memberships" onclick="toggleMenu()">Chat</a>
            <a href="#schemes" onclick="toggleMenu()">Process</a>
            {{-- <a href="#network" onclick="toggleMenu()">Network</a> --}}
            <a href="#faq" onclick="toggleMenu()">FAQs</a>
            <button class="connect-btn">Connect with us</button>
        </div>
    </nav>
    <!-- -------navbar-end----------------->
    <section class="main-section">
        <div class="row g-0">
            <div class="col-sm-12 col-md-8">
                <div class="left-section">
                    <div class="arrow">
                        <h6>We simplify Businesses</h6>
                        <button><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                    <div>
                        <h1>{{ $campaign->label }}</h1>
                        <p>
                            {{ $campaign->sub_paragraph }}
                        </p>
                    </div>
                    <div class="btnSection">
                        {{-- <button>Learn More</button> --}}
                        @if($campaign->learn_more_link)
                        <button><a href="{{ $campaign->learn_more_link }}" class="text-decoration-none text-white mb-4"
                                target="_blank">Learn More</a></button>
                        @endif
                        <a href="https://calendly.com/consolegal-desk/schedule" target="_blank"><button class="bg-primary">Book a Call</button></a>
                    </div>
                    <div>
                        <img src="{{asset('web/campaign')}}/images/star.png" alt="star" />
                        <p class="mb-0"><small class="text-secondary fs-6">4.9/5 From 502 Customers</small></p>
                    </div>
                </div>
                <style>
                    .slider {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-top: 10px;
                        height: 50px;
                        /* width: 80%; */
                        overflow: hidden;
                        /* background: rgb(255, 255, 255); */
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(7.4px);
                        -webkit-backdrop-filter: blur(7.4px);
                        /* border: 1px solid rgba(255, 255, 255, 0.4); */
                    }

                    .slider-items {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 20px;
                        animation: scrolling 20s linear infinite;
                    }

                    @keyframes scrolling {

                        0% {
                            transform: translateX(80%);
                        }

                        100% {
                            transform: translateX(-20%);
                        }
                    }

                    .slider-items img {
                        width: 20%;
                        margin: 20px;
                        max-height: 50px;
                        filter: invert(77%) brightness(91%) contrast(-10%);
                    }
                </style>
                
                <div class="slider">
                    <div class="slider-items">
                        <img src="{{asset('web/campaign')}}/images/adani.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/utkarsh-alt.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/shri.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/remairo.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/adani.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/utkarsh-alt.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/shri.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/remairo.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/adani.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/utkarsh-alt.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/shri.jpg" alt="">
                        <img src="{{asset('web/campaign')}}/images/remairo.jpg" alt="">
                    </div>
                </div>
                <!-- <img id="list" src="{{asset('web/campaign')}}/images/List.png" alt="" /> -->
            </div>
            <div class="col-md-4 col-sm-12" id="form-contact">
                <div class="rightSection">
                    <h2>Secure your spot now</h2>
                    <p>
                        Fill the box to get a call for 1-2-1 assistance with our experts.
                    </p>
                    <div class="spots">
                        {{-- <img src="{{asset('web/campaign')}}/images/dot.svg" alt="dot" /> --}}
                        {{-- <h5>2 Spots Available</h5> --}}
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                    <form action="{{ route('campaign.store', $campaign->slug) }}" method="POST">
                        @csrf
                        <label>Your Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="abc" />
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror

                        <label>Your Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" inputmode="email"
                            placeholder="username@mail" />
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror

                        <label>Your Number <span class="text-danger">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+91" />
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror

                        <label>Message <span class="text-danger">*</span></label>
                        <textarea name="message" rows="4">{{ old('message') }}</textarea>
                        @error('message') <small class="text-danger" required>{{ $message }}</small> @enderror

                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ---------about-section-start------------- -->
    <section class="aboutSection">
        <div class="about_sec">
            <img src="{{asset('web/campaign')}}/images/meet.png" alt="meet" />
            <div class="right_side">
                <div id="about">About Us</div>
                <h6>Discover Who We Are and Our Mission</h6>
                <p>
                    At ConsoLegal, we are committed to empowering Micro, Small, and
                    Medium Enterprises (MSMEs) by simplifying legal, financial, and
                    compliance processes. Our goal is to remove the complexities of
                    business registration, taxation, and regulatory requirements, so
                    entrepreneurs can focus on what truly matters—growing their
                    business.
                </p>
                <div class="btnSectionOther">
                    <a href="#form-contact" class=""><button>Contact Us &#8599;</button></a>
                    <a href="{{route('about')}}" class=""><button class="bg-primary">View More &#8599;</button></a>
                </div>
                <img src="{{asset('web/campaign')}}/images/Background.png" alt="founder" />
            </div>
        </div>
    </section>
    <!-- ---------about-section-end------------- -->
    <!-- ---------service-section-start--------------->
    <section id="program">
        <div class="serviceSection">
            <div id="about">Service</div>
            <h6>Explore Our Core Services</h6>
            <p>
                Discover our comprehensive range of services tailored to <br />
                enhance your business.
            </p>
        </div>
        <div class="main_card">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6 col-sm-12 ">
                        <div class="card">
                            <h1>Company & Business Registration</h1>
                            <p>
                                Hassle-free incorporation of your business with expert
                                guidance. We handle legal formalities, documentation, and
                                compliance efficiently.
                            </p>
                            <a href="#form-contact" class=""><button>Contact Us &#8599;</button></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <h1>Tax & Compliance Management</h1>
                            <p>
                                Stay tax-compliant with our end-to-end GST filing, income tax
                                returns, and financial reporting services. We ensure accuracy
                                and timely submissions.
                            </p>
                            <a href="#form-contact" class=""><button>Contact Us &#8599;</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container cont">
                <div class="row g-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <h1>Legal Documentation & Advisory</h1>
                            <p>
                                Get professionally drafted contracts, agreements, and
                                regulatory compliance documents. Our experts help protect your
                                business from legal risks.
                            </p>
                            <a href="#form-contact" class=""><button>Contact Us &#8599;</button></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <h1>Payroll & Accounting Services</h1>
                            <p>
                                Streamline salary processing, bookkeeping, and audits with our
                                expert-managed payroll system. Ensure compliance and accurate
                                financial tracking.
                            </p>
                            <a href="#form-contact" class=""><button>Contact Us &#8599;</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <img src="{{asset('web/campaign')}}/images/other.png" alt="other_service" class="img-fluid" />
                <div class="mainSec">
                    <div class="iconSection">
                        <img src="{{asset('web/campaign')}}/images/icon/icon_1.png" alt="icon" />
                        <p>Payroll Management</p>
                    </div>
                    <div class="iconSection">
                        <img src="{{asset('web/campaign')}}/images/icon/icon_2.png" alt="icon" />
                        <p>LLP RegistrationLLP Registration</p>
                    </div>
                    <div class="iconSection">
                        <img src="{{asset('web/campaign')}}/images/icon/icon_3.png" alt="icon" />
                        <p>GST Return Filing</p>
                    </div>
                    <div class="iconSection">
                        <img src="{{asset('web/campaign')}}/images/icon/icon_4.png" alt="icon" />
                        <p>Payroll Management</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ---------service-section-end------------------->

    <section class="asstiance" id="memberships">
        <div class="container child">
            <h6>Need expert assistance? Our team is ready to help you.</h6>
            <p>
                Speak directly with our experts for instant solutions. or Get
                real-time support via chat for your queries. d
            </p>
            <div class="btnSection other_btn_sec">
                <a href="tel:+918810878185" class="text-nowrap btn"><button class="bg-primary">Call Now
                        &#8599;</button></a>
                <a href="https://wa.me/+918810878185?text=Hello, I'm interested in your services!" target="_blank"
                    class="text-nowrap btn"><button class="bg-dark">Start Chat &#8599;</button></a>
            </div>
        </div>
    </section>

    <!-- --------process-section-start----------- -->
    <section class="main_pro" id="schemes">
        <div class="process">
            <div id="about">Process</div>
            <h6>How it Works?</h6>
            <p>
                Discover our comprehensive range of services tailored to <br />
                enhance your business.
            </p>
        </div>
        <div class="container">
            <section class="cardSection">
                <div class="process-cards">
                    <div class="cards_child">
                        <img src="{{asset('web/campaign')}}/images/icon/call.png" alt="call" />
                        <div id="step">Step 01</div>
                    </div>
                    <h6>Make a inquiry</h6>
                    <p>
                        Share your requirements with <br />
                        our team.
                    </p>
                </div>
                <div class="process-cards">
                    <div class="cards_child">
                        <img src="{{asset('web/campaign')}}/images/icon/note.png" alt="note" />
                        <div id="step">Step 02</div>
                    </div>
                    <h6>Make Payment</h6>
                    <p>
                        Choose a service and complete the payment <br />
                        securely.
                    </p>
                </div>
                <div class="process-cards">
                    <div class="cards_child">
                        <img src="{{asset('web/campaign')}}/images/icon/file.png" alt="call" />
                        <div id="step">Step 03</div>
                    </div>
                    <h6>Submit Documents</h6>
                    <p>
                        Upload necessary documents for <br />
                        proccessing.
                    </p>
                </div>
                <div class="process-cards">
                    <div class="cards_child">
                        <img src="{{asset('web/campaign')}}/images/icon/check.png" alt="check" />
                        <div id="step">Step 04</div>
                    </div>
                    <h6>Work Completed</h6>
                    <p>
                        Receive your finalized documents and <br />
                        services.
                    </p>
                </div>
            </section>
        </div>
    </section>
    <!-- --------process-section-end----------- -->
    <!-- --------consolegal-section-start------------>
    <section class="conso" id="network">
        <div class="bg_sec">
            <!-- <img src="{{asset('web/campaign')}}/images/icon/Container (1).png" alt="container" /> -->
        </div>

        <div class="mobile_size">
            <div id="step">Why Us</div>
            <h6>Why Choose ConsoLegal</h6>
            <p>With 10+ years of expertise, we are a trusted partner for MSMEs.</p>
        </div>
        <div class="work_cards_container">
            <div class="work_cards">
                <img src="{{asset('web/campaign')}}/images//cards/4.png" alt="icon" />
                <h6>10+ Years of Experienced</h6>
                <p>
                    Proven track record in legal <br />
                    and business consulting.
                </p>
            </div>
            <div class="work_cards">
                <img src="{{asset('web/campaign')}}/images//cards/5.png" alt="icon" />
                <h6>99% Client Satisfaction</h6>
                <p>
                    Thousands of happy businesses <br />
                    trust us.
                </p>
            </div>
            <div class="work_cards">
                <img src="{{asset('web/campaign')}}/images//cards/6.png" alt="icon" />
                <h6>Cost-Effective Solutions</h6>
                <p>
                    Affordable pricing without <br />
                    compromising quality.
                </p>
            </div>
            <div class="work_cards">
                <img src="{{asset('web/campaign')}}/images//cards/3.png" alt="icon" />
                <h6>Cost-Effective Solutions</h6>
                <p>
                    Affordable pricing without <br />
                    compromising quality.
                </p>
            </div>
            <div class="work_cards">
                <img src="{{asset('web/campaign')}}/images//cards/3.png" alt="icon" />
                <h6>Cost-Effective Solutions</h6>
                <p>
                    Affordable pricing without <br />
                    compromising quality.
                </p>
            </div>
            <div class="work_cards">
                <img src="{{asset('web/campaign')}}/images//cards/1.png" alt="icon" />
                <h6>Transparent Communication</h6>
                <p>
                    Clear, open lines of communication throughout every stage of your
                    <br />
                    project.
                </p>
            </div>
        </div>

        <div class="arrow_sec">
            <img src="{{asset('web/campaign')}}/images/icon/mark.png" alt="mark" />
            <h6>Join Consolegal Today</h6>
            <a href="#form-contact" class=""><button>Contact Us</button></a>
        </div>
    </section>
    <!-- --------consolegal-section-end------------->
    <!-- --------Faq-section-start------------>
    <section class="faq" id="faq">
        <div class="faqSection">
            <div id="about">Faq</div>
            <h6>Frequently Asked Questions</h6>
            <p>
                Answers to common questions about our services, processes, and what
                <br />
                sets us apart.
            </p>
        </div>
        <div class="main-acc">
            <div>
                <div class="accordion" id="accordionExample">
                    @foreach (json_decode($campaign->faqs, true) ?? [] as $index => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="true"
                                aria-controls="collapseOne">
                                {{ $faq['question'] }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}"
                            class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What documents are required for MSME registration?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It
                                is hidden by default, until the collapse plugin adds the
                                appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing
                                and hiding via CSS transitions. You can modify any of this
                                with custom CSS or overriding our default variables. It's also
                                worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit
                                overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What is the cost of MSME registration?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It
                                is hidden by default, until the collapse plugin adds the
                                appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing
                                and hiding via CSS transitions. You can modify any of this
                                with custom CSS or overriding our default variables. It's also
                                worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit
                                overflow.
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- <div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Do you provide legal and tax consultation?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It
                                is shown by default, until the collapse plugin adds the
                                appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing
                                and hiding via CSS transitions. You can modify any of this
                                with custom CSS or overriding our default variables. It's also
                                worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit
                                overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What is the cost of MSME registration?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It
                                is hidden by default, until the collapse plugin adds the
                                appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing
                                and hiding via CSS transitions. You can modify any of this
                                with custom CSS or overriding our default variables. It's also
                                worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit
                                overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Do you offer financial assistance for MSMEs?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It
                                is hidden by default, until the collapse plugin adds the
                                appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing
                                and hiding via CSS transitions. You can modify any of this
                                with custom CSS or overriding our default variables. It's also
                                worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit
                                overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="arrow_sec">
            <img src="{{asset('web/campaign')}}/images/icon/mark.png" alt="mark" />
            <h6>Still Have a Question</h6>
            {{-- <button>Ask Question</button> --}}
            <a href="https://calendly.com/consolegal-desk/schedule" target="_blank" class=""><button>Ask Question</button></a>
        </div>
    </section>
    <!-- --------Faq-section-end------------>
    <!-- ---------section-start------------>
    <section class="bottom_footer">
        <div class="container">
            <div class="Childcontainer row mx-0">
                <div class="stats-grid col-md-5 col-sm-12">
                    <div class="stat-card">
                        <h2>{{ $campaign->happy_customers }}+</h2>
                        <p>Happy Customers</p>
                    </div>
                    <div class="stat-card">
                        <h2>{{ $campaign->projects_completed }}+</h2>
                        <p>Projects Completed</p>
                    </div>
                    <div class="stat-card">
                        <h2>{{ $campaign->years_of_experience }}+</h2>
                        <p>Years of Experience</p>
                    </div>
                    <div class="stat-card">
                        <h2>{{ $campaign->team_members_count }}+</h2>
                        <p>Team Members</p>
                    </div>
                </div>

                <div class="content col-md-5 col-sm-12">
                    <div id="step">Results & Analytics</div>
                    <h2>Performance Insights and Analytics Overview</h2>
                    <p>Trusted by Leading Brands</p>
                    <div class="slider overflow-hidden">
                        <div class="slider-items">
                            <img src="{{asset('web/campaign')}}/images/adani.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/utkarsh-alt.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/shri.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/remairo.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/adani.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/utkarsh-alt.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/shri.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/remairo.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/adani.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/utkarsh-alt.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/shri.jpg" alt="">
                            <img src="{{asset('web/campaign')}}/images/remairo.jpg" alt="">
                        </div>
                    </div>
                    {{-- <img src="{{asset('web/campaign')}}/images/icon/flist.png" alt="list"> --}}
                </div>
            </div>

    </section>
    <!-- ---------section-end------------>
    <!-- ---------footer-section-start------------>
    <footer>
        <div class="footerSection">
            <img src="{{asset('web')}}/campaign/images/logo-white.png" style="max-width: 120px;" alt="logo">
            <div>
                <ul class="m-0">
                    <li><a href="/about" class="text-white text-decoration-none">About Us</a></li>
                    <li><a href="/privacy" class="text-white text-decoration-none">Privacy Policy</a></li>
                    <li><a href="/tnc" class="text-white text-decoration-none">Term & Condition</a></li>
                    <li><a href="/refund" class="text-white text-decoration-none">Refund Policy</a></li>
                    <li><a href="{{route('paynow')}}" class="text-white text-decoration-none">Pay Now</a></li>
                    <li><a href="/contact" class="text-white text-decoration-none">Contact Us</a></li>
                    <li><a href="/blogpage" class="text-white text-decoration-none">Blogs</a></li>
                    <li>Site Map</li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- ------------js-here----------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="{{asset('web/campaign')}}/script.js"></script>
</body>

</html>