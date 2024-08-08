<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="{{url('/assets/images/favicon.ico')}}" rel="shortcut icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            display: flex;
            background-color: #fff;
            padding: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .image-register {
            margin-right: 100px;
            margin-top: -50px;
        }

        .image-register img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .form-content {
            flex: 1;
        }

        .form-content h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group h5 {
            margin: 0 0 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            margin: 2px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .input-group input:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }

        .submit {
            width: 100%;
            border: none;
            background-color: #007bff;
            padding: 14px 28px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            margin-top: 10px;
        }

        .submit:hover {
            background: #0056b3;
        }

        .sign-up {
            text-align: center;
            margin-top: 10px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .row .input-group {
            flex: 1;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .image-register {
                margin-bottom: 10px;
            }

            .row {
                flex-direction: column;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#registerButton').click(function(e) {
                e.preventDefault();
                
                let formData = {
                    firstname: $('#first-name').val(),
                    lastname: $('#last-name').val(),
                    email: $('#email').val(),
                    phone_number: $('#phone-number').val(),
                    address: $('#address').val(),
                    gender: $('#gender').val(),
                    password: $('#password').val(),
                    confirm_password: $('#confirm-password').val()
                };
                
                if (formData.password !== formData.confirm_password) {
                    swal("Error", "Passwords do not match!", "error");
                    return;
                }

                $.ajax({
                    url: "{{ route('api.signup') }}", // Adjust the route as needed
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message === 'Success') {
                            swal("Success", "Account created successfully!", "success").then((value) => {
                                // Additional code to execute after the user clicks OK
                                location.reload();
                            });
                        } else {
                            swal("Error", response.message, "error");
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += value[0] + '\n';
                            });
                            swal("Validation Error", errorMessages, "error");
                        } else {
                            swal("Error", "An error occurred while processing your request.", "error");
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="image-register"> 
            <img src="{{url('/assets/image/image (7).png')}}" alt="Register Image">
        </div>
        
        <div class="form-content">
            <h3>Let's create your account</h3>

            <div class="row">
                <div class="input-group">
                    <h5>First Name</h5>
                    <input type="text" id="first-name">
                </div>
                <div class="input-group">
                    <h5>Last Name</h5>
                    <input type="text" id="last-name">
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <h5>Email ID</h5>
                    <input type="email" id="email">
                </div>
                <div class="input-group">
                    <h5>Phone Number</h5>
                    <input type="tel" id="phone-number">
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <h5>Address</h5>
                    <input type="text" id="address">
                </div>
                <div class="input-group">
                    <h5>Gender</h5>
                    <input type="text" id="gender">
                </div>
            </div>
            
            <div class="row">
                <div class="input-group">
                    <h5>Password</h5>
                    <input type="password" id="password">
                </div>
                <div class="input-group">
                    <h5>Confirm Password</h5>
                    <input type="password" id="confirm-password">
                </div>
            </div>

            <button type="submit" class="submit" id="registerButton">Create Account</button>

            <div class="sign-up">
                <h5>Already have an account?
                <a href="{{ route('login') }}">Login</a></h5>
            </div>
        </div>
    </div>
</body>
</html>
