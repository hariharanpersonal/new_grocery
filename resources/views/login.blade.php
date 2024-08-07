<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mygrocery</title>
    <link href="{{url('/assets/images/favicon.ico')}}" rel="shortcut icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .imagelogo img {
            height: 100px;
            width: 100px;
            border-radius: 50%;
            position: relative;
            left: 10px;
            top: 10px;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            height: 100%;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-box {
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h3 {
            font-family: cursive;
            font-size: 25px;
        }
        

        .chat-list-search {
            margin-bottom: 20px;
            text-align: left;
        }

        .chat-list-search h5 {
            margin-bottom: 5px;
            font-size: 15px;
            color: #333;
        }

        .chat-list-search input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .chat-list-search input:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }

        .submit {
            width: 100%;
            border: none;
            background-color: whitesmoke;
            padding: 14px 28px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            color: black;
        }

        .submit:hover {
            background: cornflowerblue;
            color: black;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .image-container img.active {
            opacity: 1;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-container">
        <div class="login-box">
        <div class="imagelogo"> 
        <img src="{{url('/assets/image/image (6).png')}}">
            
        </div>
            <h3>Welcome back !</h3>
            <div class="chat-list-search">
                <h5>Email</h5>
                <input type="email" id="email">
            </div>
            <div class="chat-list-search">
                <h5>Password</h5>
                <input type="password" id="password">
            </div>
            <button type="submit" class="submit" id="loginButton">Log in</button>
        </div>
    </div>
    <div class="image-container">
        <img src="https://img.freepik.com/free-photo/3d-rendering-cartoon-shopping-cart_23-2151680574.jpg?t=st=1723026837~exp=1723030437~hmac=aa3eb76c2fd66dcf291f23a5a18441eb16863303cf1a838ca55ad56d6fa42379&w=360" alt="Image 1" class="active">
        <img src="https://img.freepik.com/premium-photo/brown-paper-grocery-bag-fruit-vegetables-bread-milk_185667-15890.jpg?w=360" alt="Image 2">
        <img src="https://img.freepik.com/free-photo/concept-fresh-natural-farm-product-eggs_185193-108263.jpg?t=st=1723027561~exp=1723031161~hmac=60a888dbecbc666c596fd912e1e900ba46bbafb86bb221c7d0daf4cc26514035&w=360" alt="Image 3">
        
    </div>
</div>

<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.image-container img');
    const totalImages = images.length;

    function showNextImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % totalImages;
        images[currentIndex].classList.add('active');
    }

    setInterval(showNextImage, 3000);
</script>

<script>
    $(document).ready(function() {
        $('#loginButton').on('click', function() {
            var email = $('#email').val().trim();
            var password = $('#password').val().trim();
            
            if(email ==''){
                swal({
                    title: "Error!",
                    text: 'Please enter a valid email',
                    icon: "error",
                    button: "Ok",
                });
            }
            if(password ==''){
                swal({
                    title: "Error!",
                    text: 'Please enter the Password',
                    icon: "error",
                    button: "Ok",
                });
            }
            
        });
    });
</script>

</body>
</html>
