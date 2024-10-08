<?php
// Include database connection
include './admin/db_connect.php';

// Fetch careers data from the database
$sql = "SELECT * FROM careers";
$result = mysqli_query($connect, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- remix icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Tailwind -->
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ url_for('serve_css') }}">
    <title>Tozai Website</title>
</head>

<body>

    <!--=============== HEADER ===============-->
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="./index.html" class="nav__logo">
                    <img class="w-[8rem] sm:w-[9rem]" src="../assets/img/Tozai Safety.jpg" alt="Tozai Safety Logo">
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-fill nav__burger"></i>
                    <i class="ri-close-line nav__close"></i>
                </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li><a href="./index.html" class="nav__link">Home</a></li>

                    <li><a href="./about-us.html" class="nav__link">About us</a></li>

                    <li class="dropdown__item">
                        <a href="./product.html">
                            <div class="nav__link">
                                Products
                            </div>
                        </a>
                    </li>

                    <li class="dropdown__item">
                        <a href="#careers">
                            <div class="nav__link">
                                Careers
                            </div>
                        </a>
                    </li>

                    <li><a href="#cta" class="nav__link">Contact us</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="w-[91%] mx-auto">
        <!-- Home Page -->
        <section id="hero-section" class="w-full hero_section flex flex-col sm:flex-row justify-between items-center">

            <div class="w-full md:w-[67vw] sm:pr-9 mb-8 md:mb-0">
                <h1 class="font-medium font-dmsans mb-4 text-[#161613]">
                    Tozai Safety: Your
                    safety solutions partner</h1>
                <p class="text-[#161613] font-inter">
                    Welcome to Tozai Safety! We are a leading Indian manufacturer with over 30 years in the personal
                    protective equipment (PPE) space and we’re renowned for our specialization in hand safety products.
                    Our commitment to quality ensures that each product is meticulously designed to provide optimal
                    protection while delivering exceptional comfort. We prioritize the safety of our customers without
                    sacrificing usability or ease of wear. <br> <br>
                    At Tozai Safety, we understand that effective protection is crucial in today’s demanding work
                    environments. Our comprehensive range of safety solutions is crafted to meet the highest global
                    safety standards, ensuring that workers can perform their tasks with confidence and ease. We are a
                    trusted OEM partner for many international brands.
                </p>
            </div>

            <div class="hero__img">
                <img src="https://i.pinimg.com/564x/fa/82/ea/fa82ea06a3384c0df5a006108edd1c08.jpg"
                    class="md:h-[calc(100vh-5rem)] md:p-0 p-2 object-cover object-right" alt="Worker with PPE">
            </div>
        </section>

        <!-- About Page -->
        <section id="aboutUs" class="sm:pt-20 flex gap-4 flex-col md:flex-row items-center">
            <div>
                <img src="../assets/img/about-img.png" alt="Worker with PPE"
                    class="md:h-[92vh] w-[90vw] sm:p-0 p-2 object-fill sm:w-[45vw]">
            </div>

            <div class="md:w-2/3 mb-8 md:mb-0">
                <h1 class="font-medium font-dmsans mb-4">About Us</h1>
                <p class="font-inter">Tozai Safety has been a leader in PPE manufacturing for decades,
                    driven by a
                    commitment to quality, innovation, and worker safety.</p>
                <div class="flex flex-col sm:flex-row gap-4 mt-6 justify-between">
                    <div class="bg-[#EDEBE3] p-4">
                        <h3 class="font-semibold font-dmsans">Our Mission</h3>
                        <p class="font-inter">To provide high-quality, reliable PPE that protects your work
                            force and enhances user safety
                            for all industrial applications.</p>
                    </div>
                    <div class="bg-[#EDEBE3] p-4">
                        <h3 class="font-semibold font-dmsans">Our Values</h3>
                        <p class="font-inter">We prioritize comfort without compromising protection. We
                            adhere to strict quality control
                            measures to ensure customer satisfaction.</p>
                    </div>
                </div>
                <div class="bg-[#EDEBE3] p-4 mt-4">
                    <h3 class="font-semibold font-dmsans">Our Team</h3>
                    <p class="font-inter">With over 30 years of industry expertise, we are a trusted OEM
                        partner to many renowned names
                        worldwide, delivering superior hand safety products that cater to diverse industrial needs.</p>
                </div>
            </div>
        </section>

        <!-- Career Section -->
        <section id="careers" class="sm:py-[8rem] items-center">
            <h1 class="font-medium font-dmsans mb-0 pt-4">Careers</h1>
            <p class="mb-8 text-gray-700 font-inter">Join our team of passionate
                professionals dedicated to
                ensuring safety in the workplace. Contact us at<br><b class="text-red-500"> <a
                        href="mailto:talent@texbrex.com">talent@texbrex.com</a></b> to know about opportunities
                at Tozai Safety.</p>
            <div class="flex flex-wrap justify-between space-y-6 md:space-y-0">
                <div class="w-full md:w-1/2 lg:w-1/4 p-4 text-left">
                    <div class="flex flex-col items-start md:mb-4">
                        <i class="fa-solid fa-chart-line text-5xl text-black mb-2 sm:mb-4"></i>
                        <h3 class="mb-0 sm:mb-2 font-dmsans font-medium">Career Growth</h3>
                        <p class="text-gray-600 font-inter">We provide opportunities for
                            professional
                            development and advancement.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 p-4 text-left">
                    <div class="flex flex-col items-start md:mb-4">
                        <i class="fa-solid fa-people-group text-5xl text-black mb-2 sm:mb-4"></i>
                        <h3 class="font-dmsans font-medium mb-0 sm:mb-2">Teamwork</h3>
                        <p class="text-gray-600 font-inter">We foster a collaborative and
                            supportive work
                            environment.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 p-4 text-left">
                    <div class="flex flex-col items-start md:mb-4">
                        <i class="fa-regular fa-lightbulb text-5xl text-black mb-2 sm:mb-4"></i>
                        <h3 class="font-dmsans font-medium mb-0 sm:mb-2">Innovation</h3>
                        <p class="text-gray-600 font-inter">We encourage creativity and
                            innovation to
                            enhance safety solutions.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 p-4 text-left">
                    <div class="flex flex-col items-start mb-4">
                        <i class="fa-solid fa-magnifying-glass text-5xl text-black mb-2 sm:mb-4"></i>
                        <h3 class="font-dmsans font-medium mb-0 sm:mb-2">Open Positions</h3>
                        <p class="text-gray-600 font-inter">Explore our current job
                            openings and find your
                            perfect fit.</p>
                    </div>
                </div>
            </div>

            <div class="carrer_role px-4 py-8">
                <!-- Card Container -->
                <div class="grid gap-6 md:gap-10 justify-center md:grid-cols-2 lg:grid-cols-4">
                    
                    <!-- Cards to add -->
                    <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="career-card-container">
                    <div class="career-card" onclick="toggleCard(this)">
                        <div class="career-card__header">
                            <div class="career-card__icon text-blue-500">
                                <i class="fas fa-<?php echo htmlspecialchars($row['icon_class']); ?> fa-2x"></i>

                            </div>
                            <h2 class="career-card__title text-lg font-bold"><?php echo htmlspecialchars($row['title']); ?></h2>
                        </div>
                    </div>
                    <div class="career-card__content">
                                        <h3 class="text-lg font-bold">Key Requirements</h3>
                                        <ul class="list-disc list-inside">
                                            <?php foreach (explode("\n", htmlspecialchars($row['requirements'])) as $requirement): ?>
                                                <li><?php echo trim($requirement); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <h3 class="text-lg font-bold mt-4">Qualifications</h3>
                                        <p><?php echo htmlspecialchars($row['qualifications']); ?></p>
                                        <h3 class="text-lg font-bold mt-4">Location</h3>
                                        <p><?php echo htmlspecialchars($row['location']); ?></p>
                                        <button onclick="sendEmail()"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-2 mt-2 rounded">Apply Now</button>
                                    </div>
                </div>
                <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center">No career opportunities available at the moment.</p>
                    <?php endif; ?>


            </div>
            </div>

        </section>

        <!-- Contact Us -->
        <section id="cta" class="items-center">
            <div>
                <h1 class="pt-4 font-medium font-dmsans">Contact Us</h1>
                <p class="font-inter mt-1">We're here to answer your questions and provide
                    assistance
                    with your PPE needs. Explore how Tozai Safety can enhance your workplace safety standards. Connect
                    with us:</p>
            </div>

            <div class="mt-4">
                <div class="flex flex-col gap-6">

                    <div class="contact-head">
                        <div class="icons">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h3>Phone</h3>
                            <p>Call our dedicated customer support line: <b>+91 22 43337200 (10AM-6PM IST)</b></p>
                        </div>
                    </div>

                    <div class="contact-head">
                        <div class="icons">
                            <a href="mailto:mail@tozaisafety.com">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </div>
                        <div>
                            <h3>Email</h3>
                            <a href="mailto:mail@tozaisafety.com">
                                <p class="text-[16px]">Reach out to our team at:
                                    <b>mail@tozaisafety.com</b>
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="contact-head">
                        <div class="icons">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h3>Address</h3>
                            <p class="text-[16px]">Visit our office: <b>144A, Mittal Tower, Nariman
                                    Point, Mumbai 400021 </b></p>
                            </a>
                        </div>
                    </div>

                    <div class="contact-head">
                        <div class="icons">
                            <a href="https://www.linkedin.com/company/tozai-safety-private-limited/" target="_blank">
                                <i class="fa-brands fa-linkedin text-[2rem]"></i>
                            </a>
                        </div>

                        <div>
                            <h3>
                                <a href="https://www.linkedin.com/company/tozai-safety-private-limited/"
                                    target="_blank"> LinkedIn </a>
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- <div class="sm:text-[25px] font-dmsans font-medium">
                <h3>LinkedIn <a href="#" class="text-[20px] font-inter font-normal">
                        <i class="fa-brands fa-linkedin text-[2rem] text-blue-700"></i></h3>
            </div> -->

        </section>

        <section class="pt-20"></section>

    </main>

    <!-- Script Js -->
    <script src="../script.js"></script>
</body>

</html>