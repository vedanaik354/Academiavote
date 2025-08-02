<?php
$connect = mysqli_connect('localhost', 'root', '', 'aca_votingdb');
if (!$connect) {
    die('Could not connect: ' . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Academia Vote</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* White background */
            color: #333;
        }

        header {
            background-color: #1a237e;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        section {
            padding: 40px 20px;
            max-width: 900px;
            margin: 30px auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 8px;
        }

        h2 {
            color: #3949ab;
            margin-top: 30px;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #1a237e;
            color: #fff;
            margin-top: 40px;
        }

        @media (max-width: 600px) {
            header h1 {
                font-size: 1.8em;
            }

            section {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>About Academia Vote</h1>
</header>

<section>
    <p>As the oldest continuously run educational institution, The SDM College remains committed to providing an academically rigorous education to students who will walk out of college ready for lives of leadership and service to their community. From literacy to music and art, each day at the SDM College is filled with activities that are both enriching and fun.</p>

    <p>Everyday at the SDM College is like a blessing with the active students and talented staff members around.</p>

    <p><strong>Dr. D. L. Hebbar - Principal</strong></p>

    <h2>SDM College at a Glance</h2>
    <ul>
        <li><strong>Current Enrollments:</strong> 1000+</li>
        <li><strong>Qualified Staff:</strong> 50+</li>
        <li><strong>Committees and Clubs:</strong> 30+</li>
        <li><strong>Active GC Members:</strong> 100+</li>
    </ul>

    <h2>Our Vision</h2>
    <p>To provide affordable quality education, while equipping students with knowledge and skills in their chosen stream, inculcating values and ideas for a better society.</p>

    <h2>Contact Us</h2>
    <p><strong>Address:</strong> Prabhat Nagar, Honnavar, Uttara Kannada, Karnataka - 581334</p>
    <p><strong>Contact Number:</strong> Mobile: +91 9448526401 | Landline: 08387-220293</p>
    <p><strong>Email:</strong> princesdmchnr@gmail.com</p>

    <h2>PG Center</h2>
    <p><strong>Address:</strong> Prabhat Nagar, Honnavar, Uttara Kannada, Karnataka - 581334</p>
    <p><strong>Contact Number:</strong> Mobile: +91 8971108115</p>
    <p><strong>Email:</strong> principalsdmcpgc@gmail.com</p>
</section>

<footer>
    &copy; 2025 Academia Vote. All rights reserved.
</footer>

</body>
</html>
