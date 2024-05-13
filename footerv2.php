<!-- footerv2.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .unique-footer {
            background-color: #111;
            margin-top: auto;
        }
        .unique-footer-container {
            width: 100%;
            padding: 70px 30px 20px;
        }
        .unique-social-icons {
            display: flex;
            justify-content: center;
        }
        .unique-social-icons a {
            text-decoration: none;
            padding: 10px;
            background-color: white;
            margin: 10px;
            border-radius: 50%;
        }
        .unique-social-icons a i {
            font-size: 2em;
            color: black;
            opacity: 0, 9;
        }
        /* Hover affect on social media icon */
        .unique-social-icons a:hover {
            background-color: #111;
            transition: 0.5s;
        }
        .unique-social-icons a:hover i {
            color: white;
            transition: 0.5s;
        }
        .unique-footer-nav {
            margin: 30px 0;
        }
        .unique-footer-nav ul {
            display: flex;
            justify-content: center;
            list-style-type: none;
        }
        .unique-footer-nav ul li a {
            color: white;
            margin: 20px;
            text-decoration: none;
            font-size: 1.3em;
            opacity: 0.7;
            transition: 0.5s;
        }
        .unique-footer-nav ul li a:hover {
            opacity: 1;
        }
        .unique-footer-bottom {
            background-color: #000;
            padding: 20px;
            text-align: center;
        }
        .unique-footer-bottom p {
            color: white;
        }
        .unique-designer {
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 400;
            margin: 0px 5px;
        }
        @media (max-width: 700px) {
            .unique-footer-nav ul {
                flex-direction: column;
            }
            .unique-footer-nav ul li {
                width: 100%;
                text-align: center;
                margin: 10px;
            }
            .unique-social-icons a {
                padding: 8px;
                margin: 4px;
            }
        }
    </style>
    <title>Footer</title>
</head>
<body>
    <footer class="unique-footer">
        <div class="unique-footer-container">
            <div class="unique-social-icons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="unique-footer-nav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">News</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">our Team</a></li>
                </ul>
            </div>
        </div>
        <div class="unique-footer-bottom">
            <p>Copyright &copy;2023; Project <span class="unique-designer">STYL</span></p>
        </div>
    </footer>
</body>
</html>
