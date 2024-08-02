        <?php include 'php/menu.php'; ?>
            <div id="banner">
                <img src="media/background.jpg" alt="Background image" class="banner-image">
                <h1 class="effect-type centered">I'm Richard Searle</h1>
                <h2 class="effect-type centered">- Web Developer -</h2>

                <a href="#bottom" class="centered hide-lessthanS">Scroll Down<br>vvv</a>
            </div>
        </header>
        <main>
            <div class="container" >
                <div id="project-list">
                    <a href="https://netmatters-homepage.richard-searle.netmatters-scs.co.uk" target="_blank">
                        <div class="project-item odd">
                            <img class="project-img" src="media/project-one.png" alt="Netmatters homepage project">
                            <h2>Netmatters Site</h2>
                            <h3 class="icon icon-arrow_right">View Project</h3>
                        </div>
                    </a>
                    <a href="https://js-array.richard-searle.netmatters-scs.co.uk" target="_blank">
                        <div class="project-item even">
                            <img class="project-img" src="media/project-two.png" alt="Image arrays">
                            <h2>Image arrays</h2>
                            <h3 class="icon icon-arrow_right">View Project</h3>
                        </div>
                    </a>
                    <div class="project-item odd">
                        <img class="project-img" src="media/project-one.png" alt="Netmatters homepage project">
                        <h2>Project Three</h2>
                        <h3 class="icon icon-arrow_right">View Project</h3>
                    </div>
                    <div class="project-item even">
                        <img class="project-img" src="media/project-one.png" alt="Netmatters homepage project">
                        <h2>Project Four</h2>
                        <h3 class="icon icon-arrow_right">View Project</h3>
                    </div>
                    <div class="project-item odd">
                        <img class="project-img" src="media/project-one.png" alt="Netmatters homepage project">
                        <h2> Project Five</h2>
                        <h3 class="icon icon-arrow_right">View Project</h3>
                    </div>
                    <div class="project-item even">
                        <img class="project-img" src="media/project-one.png" alt="Netmatters homepage project">
                        <h2>Project Six</h2>
                        <h3 class="icon icon-arrow_right">View Project</h3>
                    </div>
                </div>
                <div id="get-in-touch">
                    <div id="information">
                        <div>
                            <h2>Get In Touch</h2>
                            <p>Feel free to contact me by any means provided here.</p>
                        </div>
                        <div>
                            <h3>07407 167653</h3>
                            <h3>rsearle99@gmail.com</h3>
                            <p>The best time of day to call me is between 10am and 3pm.<br> An email will be replied to swiftly.</p>
                        </div>
                    </div>
                    <div id="inputs">
                        <form id="contactForm" action="php/send_email.php" method="post" onsubmit="return validateForm()">
                            <div class="form-group name-inputs">
                                <label class="hidden">Your first name</label>
                                <input class="form-input" id="email-firstname" name="firstname" type="text" placeholder="First Name*" required>

                                <label class="hidden">Your last name</label>
                                <input class="form-input" id="email-lastname" name="lastname" type="text" placeholder="Last Name*" required>
                            </div>
                            <div class="form-group">
                                <label class="hidden">Your email address</label>
                                <input class="form-input" id="email-address" name="emailaddress" type="email" placeholder="Email Address*" required>
                            </div>
                            <div class="form-group">
                                <label class="hidden">Subject matter</label>
                                <input class="form-input" id="email-subject" name="subjectmatter" type="text" placeholder="Subject*" required>
                            </div>
                            <div class="form-group">
                                <label class="hidden">Your message</label>
                                <textarea class="form-input" id="email-message" name="message" placeholder="Message..." required></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn email-submit darken">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'php/footer.php'; ?>