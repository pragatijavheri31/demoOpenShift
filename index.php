
<?php
$name = "Pragati Javheri";
$version = "2.0";
$currentTime = date("h:i A");
$currentDate = date("l, d F Y");

$greeting = "Welcome back";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP App | Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f7fc;
            color: #1e293b;
            min-height: 100vh;
        }

        /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            background: #ffffff;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        .logo {
            font-size: 23px;
            font-weight: 800;
            color: #635bdb;
        }

        .logo span {
            color: #1e293b;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
            color: #64748b;
        }

        .profile {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #635bdb, #a78bfa);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        /* Main Container */
        .container {
            max-width: 1150px;
            margin: 45px auto;
            padding: 0 25px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #172554;
        }

        .welcome p {
            color: #64748b;
            font-size: 15px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(120deg, #5145cd, #8b5cf6);
            padding: 45px;
            border-radius: 20px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(99, 91, 219, 0.2);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            right: -50px;
            top: -90px;
        }

        .hero h2 {
            font-size: 30px;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .hero p {
            font-size: 16px;
            line-height: 1.7;
            color: #ede9fe;
            max-width: 600px;
            position: relative;
            z-index: 1;
        }

        .hero .version {
            display: inline-block;
            margin-top: 22px;
            background: rgba(255,255,255,0.2);
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 13px;
            position: relative;
            z-index: 1;
        }

        /* Cards */
        .section-title {
            margin: 40px 0 20px;
            font-size: 21px;
            color: #172554;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.035);
            transition: 0.3s ease;
            border: 1px solid #edf0f7;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.08);
        }

        .icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 20px;
        }

        .purple { background: #ede9fe; }
        .blue { background: #dbeafe; }
        .green { background: #dcfce7; }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 14px;
        }

        /* User Information */
        .info-section {
            background: white;
            margin-top: 30px;
            padding: 28px;
            border-radius: 16px;
            border: 1px solid #edf0f7;
        }

        .info-section h3 {
            margin-bottom: 20px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid #f1f5f9;
            gap: 15px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #64748b;
        }

        .info-value {
            font-weight: 600;
            text-align: right;
        }

        .status {
            color: #16a34a;
            background: #dcfce7;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 30px 15px;
            color: #94a3b8;
            font-size: 13px;
            margin-top: 35px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 18px 5%;
            }

            .container {
                margin-top: 30px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 30px 25px;
            }

            .hero h2 {
                font-size: 24px;
            }

            .welcome h1 {
                font-size: 26px;
            }

            .info-row {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">PHP<span>App.</span></div>

        <div class="nav-right">
            <span>My Account</span>
            <div class="profile">
                <?php echo strtoupper(substr($name, 0, 1)); ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">

        <div class="welcome">
            <h1><?php echo $greeting; ?>, <?php echo htmlspecialchars($name); ?>! 👋</h1>
            <p>Here's what's happening with your application today.</p>
        </div>

        <!-- Hero -->
        <section class="hero">
            <h2>Welcome to My PHP App 🚀</h2>

            <p>
                Your application is successfully running!
                Explore your dashboard and enjoy a clean,
                modern and responsive experience built using PHP, HTML and CSS.
            </p>

            <span class="version">
                ✨ Version <?php echo $version; ?>
            </span>
        </section>

        <!-- Features -->
        <h2 class="section-title">Application Overview</h2>

        <section class="cards">

            <div class="card">
                <div class="icon purple">⚡</div>
                <h3>Fast & Lightweight</h3>
                <p>
                    A simple PHP application designed with
                    clean code and lightweight styling.
                </p>
            </div>

            <div class="card">
                <div class="icon blue">🎨</div>
                <h3>Modern Design</h3>
                <p>
                    Beautiful gradients, responsive layouts,
                    smooth hover effects and elegant cards.
                </p>
            </div>

            <div class="card">
                <div class="icon green">🔒</div>
                <h3>PHP Powered</h3>
                <p>
                    Dynamic content generated using PHP
                    variables and server-side rendering.
                </p>
            </div>

        </section>

        <!-- User Details -->
        <section class="info-section">
            <h3>Application Information</h3>

            <div class="info-row">
                <span class="info-label">Application Name</span>
                <span class="info-value">My PHP App</span>
            </div>

            <div class="info-row">
                <span class="info-label">User Name</span>
                <span class="info-value">
                    <?php echo htmlspecialchars($name); ?>
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Application Version</span>
                <span class="info-value">
                    <?php echo htmlspecialchars($version); ?>
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Server Time</span>
                <span class="info-value">
                    <?php echo $currentTime; ?>
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Current Date</span>
                <span class="info-value">
                    <?php echo $currentDate; ?>
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Application Status</span>
                <span class="info-value">
                    <span class="status">● Running Successfully</span>
                </span>
            </div>

        </section>

    </main>

    <!-- Footer -->
    <footer>
        <p>
            © <?php echo date("Y"); ?> My PHP App.
            Designed with ❤️ using PHP.
        </p>
    </footer>

</body>
</html>
