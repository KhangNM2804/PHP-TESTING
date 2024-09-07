<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- SweetAlert2 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
      rel="stylesheet"
    />

    <!-- Font Awesome for Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <!-- jQuery, Bootstrap JS, and SweetAlert2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      .contact-form {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 8px;
        height: 100%;
      }

      .contact-info {
        background-color: #001f3f;
        color: white;
        padding: 40px;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
      }

      .contact-info h3 {
        margin-bottom: 30px;
        font-size: 1.5rem;
      }

      .contact-info ul {
        list-style: none;
        padding: 0;
      }

      .contact-info ul li {
        margin-bottom: 30px; /* Increased margin for more spacing */
        display: flex;
        align-items: center;
        font-size: 1rem;
      }

      .contact-info ul li i {
        margin-right: 15px;
        font-size: 1.3rem;
      }

      .social-icons {
        display: flex;
        justify-content: center; /* Center the icons horizontally */
        gap: 20px; /* Increased gap between the icons */
      }

      .social-icons a {
        color: white;
        font-size: 1.5rem;
      }

      .social-icons a:hover {
        color: #bbb;
      }

      /* Align the button to the right */
      .btn-send {
        float: right;
      }
    </style>
  </head>

  <body>
    <div class="container mt-5">
      <div class="row">
        <!-- Contact Form -->
        <div class="col-md-8 d-flex">
          <div class="contact-form w-100">
            <h3>Send us a Message</h3>
            <form id="contactForm" method="POST">
              <div class="row">
                <div class="form-group col-6">
                  <label for="name">Your Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                  />
                </div>
                <div class="form-group col-6">
                  <label for="email">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="phone">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone"
                    name="phone"
                  />
                </div>
                <div class="form-group col-6">
                  <label for="company">Company</label>
                  <input
                    type="text"
                    class="form-control"
                    id="company"
                    name="company"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                  <label for="message">Message</label>
                  <textarea
                    class="form-control"
                    id="message"
                    name="message"
                    rows="5"
                  ></textarea>
                </div>
              </div>

              <!-- Button aligned right -->
              <button type="submit" class="btn btn-primary btn-send">
                Send
              </button>
            </form>
          </div>
        </div>

        <!-- Contact Information -->
        <div class="col-md-4 d-flex">
          <div class="contact-info w-100">
            <!-- Top Section: Contact Details -->
            <div>
              <h3>Contact Information</h3>
              <ul>
                <li>
                  <i class="fas fa-map-marker-alt"></i> Hẻm 49 Trần Hoàng Na,
                  Phường Hưng Lợi, Quận Ninh Kiểu, TP Cần Thơ
                </li>
                <li><i class="fas fa-phone"></i> 0357148040</li>
                <li><i class="fas fa-envelope"></i> khangnm2804@gmail.com</li>
              </ul>
            </div>

            <!-- Bottom Section: Social Media Icons -->
            <div class="social-icons">
              <a href="https://twitter.com" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://linkedin.com" target="_blank">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="https://instagram.com" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function () {
        $("#contactForm").submit(function (event) {
          event.preventDefault();

          var name = $("#name").val().trim();
          var phone = $("#phone").val().trim();
          var email = $("#email").val().trim();
          var message = $("#message").val().trim();
          var company = $("#company").val().trim(); // Company field

          // Regular Expression for phone validation (only digits, 10-15 characters)
          var phonePattern = /^[0-9]{10,15}$/;

          // Regular Expression for email validation
          var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

          // Validate that all fields are filled
          if (
            name === "" ||
            phone === "" ||
            email === "" ||
            message === "" ||
            company === ""
          ) {
            Swal.fire({
              icon: "error",
              title: "Face-plant!",
              text: "All fields are required",
              confirmButtonText: "Try again",
              confirmButtonColor: "#dc3545",
            });
            return;
          }

          // Validate phone number
          if (!phonePattern.test(phone)) {
            Swal.fire({
              icon: "error",
              title: "Invalid Phone Number!",
              text: "Please enter a valid phone number (only digits, 10-15 characters).",
              confirmButtonText: "Try again",
              confirmButtonColor: "#dc3545",
            });
            return;
          }

          // Validate email
          if (!emailPattern.test(email)) {
            Swal.fire({
              icon: "error",
              title: "Invalid Email!",
              text: "Please enter a valid email address.",
              confirmButtonText: "Try again",
              confirmButtonColor: "#dc3545",
            });
            return;
          }

          // If all validations pass, show success message and submit form
          Swal.fire({
            icon: "success",
            title: "Success!",
            text: "Your message has been sent successfully!",
            confirmButtonText: "OK",
            confirmButtonColor: "#28a745",
          }).then(function () {
            // Submit the form to thankyou.php
            $("#contactForm").off("submit"); // Disable the preventDefault
            $("#contactForm").attr("action", "thankyou.php");
            $("#contactForm").submit(); // Submit form programmatically
          });
        });
      });
    </script>
  </body>
</html>
