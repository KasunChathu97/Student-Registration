<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application - Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: url('images/photo.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 50vh;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            color: #f8f9fa !important;
        }
        .register-btn {
            color: white;
            background-color: #28a745;
            border: none;
            margin-right: 10px;
            margin-left: 10px;
            transition: background-color 0.3s;
        }
        .register-btn:hover {
            background-color: #218838;
        }
        .profile-btn {
            color: white;
            background-color: #17a2b8;
            border: none;
            margin-right: 10px;
            transition: background-color 0.3s;
        }
        .profile-btn:hover {
            background-color: #117a8b;
        }
        .btn-primary {
            color: white;
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .carousel-inner img {
            height: 550px; /* Set a fixed height for carousel images */
            object-fit: cover; /* Maintain aspect ratio while cropping excess */
        }
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 01px 0;
            margin-top: auto; /* Push footer to the bottom of the page */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">DDA Campus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-primary" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn register-btn" href="index_1.php">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/student.jpg" class="d-block w-100" alt="Student">
            </div>
            <div class="carousel-item">
                <img src="images/pexels.jpg" class="d-block w-100" alt="Tossing Up">
            </div>
            <div class="carousel-item">
                <img src="images/desktop.jpg" class="d-block w-100" alt="Desktop">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Footer -->
    <footer >
    <div class="container">
        <div class="row text-center align-items-center">
            <!-- Campus Info -->
            <div class="col-md-4">
                <p>123, Main Street Digana,Kandy,Sri Lanka</p>
                <p>Phone: +1 234 567 890</p>
                <p>Email: info@campus.edu</p>
            </div>

            <!-- Social Media -->
            <div class="col-md-4">
                <h6>Follow Us</h6>
                <a href="https://facebook.com" target="_blank" style="color: white; margin-right: 10px;">Facebook</a>
                <a href="https://twitter.com" target="_blank" style="color: white; margin-right: 10px;">Twitter</a>
                <a href="https://linkedin.com" target="_blank" style="color: white;">LinkedIn</a>
            </div>

            <!-- Copyright -->
            <div class="col-md-4">
                <p>© 2024 DDA Campus. All rights reserved.</p>
                <a href="/terms" style="color: white; margin-right: 10px;">Terms of Use</a>
                <a href="/privacy" style="color: white;">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
