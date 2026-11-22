
<?php
// Application Configuration
$appName = "Pragati's PHP Application";
$appVersion = "2.0.0";
$owner = "Pragati Javheri";

// Detect application URL (works with OpenShift Routes)
$protocol = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https'
) ? 'https' : 'http';

$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$appUrl = $protocol . '://' . $host;

// Server Information
$phpVersion = PHP_VERSION;
$serverTime = date('d M Y, h:i:s A');
$currentYear = date('Y');

// OpenShift environment detection
$isOpenShift = !empty(getenv('KUBERNETES_SERVICE_HOST')) ||
               !empty(getenv('OPENSHIFT_BUILD_NAME')) ||
               !empty(getenv('OPENSHIFT_BUILD_NAMESPACE'));

$platform = $isOpenShift ? "Red Hat OpenShift" : "Local / Other Environment";
$deploymentStatus = "Application Responding";
$environment = getenv('OPENSHIFT_BUILD_NAMESPACE') ?: 'OpenShift Container Platform';
$buildName = getenv('OPENSHIFT_BUILD_NAME') ?: 'PHP Application Deployment';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo htmlspecialchars($appName); ?> | OpenShift</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #080d1b;
    color: #e2e8f0;
    min-height: 100vh;
}

/* Background */
.background {
    position: fixed;
    inset: 0;
    z-index: -1;
    background:
        radial-gradient(circle at 10% 10%, rgba(109,40,217,.22), transparent 35%),
        radial-gradient(circle at 90% 80%, rgba(14,165,233,.15), transparent 35%),
        #080d1b;
}

/* Navbar */
.navbar {
    padding: 20px 7%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(255,255,255,.08);
    background: rgba(15,23,42,.75);
}

.brand {
    display: flex;
    align-items: center;
    gap: 13px;
}

.brand-icon {
    width: 43px;
    height: 43px;
    background: linear-gradient(135deg,#7c3aed,#2563eb);
    border-radius: 12px;
    display: grid;
    place-items: center;
    font-size: 22px;
}

.brand h2 {
    font-size: 19px;
    letter-spacing: .3px;
}

.brand small {
    display: block;
    color: #94a3b8;
    font-size: 11px;
    margin-top: 3px;
}

.nav-status {
    color: #4ade80;
    background: rgba(34,197,94,.1);
    border: 1px solid rgba(34,197,94,.25);
    border-radius: 30px;
    padding: 9px 16px;
    font-size: 12px;
    font-weight: 600;
}

/* Main */
.container {
    max-width: 1150px;
    margin: auto;
    padding: 55px 25px;
}

/* Hero */
.hero {
    padding: 50px;
    border-radius: 22px;
    background: linear-gradient(115deg,#312e81,#6d28d9 55%,#4338ca);
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(76,29,149,.2);
}

.hero::before {
    content: "☁";
    position: absolute;
    right: 55px;
    top: 0;
    font-size: 190px;
    opacity: .12;
}

.tag {
    display: inline-block;
    background: rgba(255,255,255,.15);
    padding: 8px 14px;
    border-radius: 30px;
    font-size: 12px;
    margin-bottom: 22px;
    letter-spacing: 1px;
}

.hero h1 {
    font-size: 39px;
    line-height: 1.25;
    margin-bottom: 16px;
    max-width: 700px;
}

.hero h1 span {
    color: #c4b5fd;
}

.hero p {
    color: #e0e7ff;
    line-height: 1.8;
    max-width: 650px;
    font-size: 15px;
}

.hero-info {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 28px;
}

.hero-info span {
    padding: 10px 15px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 8px;
    font-size: 12px;
}

/* URL */
.url-card {
    margin-top: 25px;
    background: #111b30;
    border: 1px solid #293750;
    border-radius: 14px;
    padding: 22px 25px;
}

.url-label {
    font-size: 11px;
    color: #94a3b8;
    letter-spacing: 1.5px;
    margin-bottom: 12px;
}

.url-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.url-text {
    font-size: 16px;
    color: #67e8f9;
    word-break: break-all;
    font-weight: 600;
}

.url-badge {
    background: rgba(34,197,94,.12);
    color: #4ade80;
    border-radius: 7px;
    padding: 7px 12px;
    font-size: 11px;
}

/* Section */
.section-heading {
    margin: 45px 0 20px;
}

.section-heading h2 {
    font-size: 21px;
    margin-bottom: 7px;
}

.section-heading p {
    color: #94a3b8;
    font-size: 13px;
}

/* Cards */
.grid {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 18px;
}

.card {
    background: #111b30;
    border: 1px solid #243149;
    border-radius: 15px;
    padding: 25px;
    transition: .3s;
}

.card:hover {
    transform: translateY(-5px);
    border-color: #7c3aed;
}

.card-icon {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    display: grid;
    place-items: center;
    font-size: 23px;
    margin-bottom: 20px;
}

.purple { background: rgba(139,92,246,.17); }
.blue { background: rgba(14,165,233,.17); }
.green { background: rgba(34,197,94,.17); }
.orange { background: rgba(249,115,22,.17); }
.pink { background: rgba(236,72,153,.17); }
.cyan { background: rgba(6,182,212,.17); }

.card h3 {
    font-size: 15px;
    margin-bottom: 10px;
}

.card .value {
    font-size: 21px;
    font-weight: 700;
    color: #c4b5fd;
    margin-bottom: 8px;
    word-break: break-word;
}

.card p {
    color: #94a3b8;
    font-size: 12px;
    line-height: 1.6;
}

/* Deployment */
.deployment {
    margin-top: 35px;
    padding: 30px;
    background: linear-gradient(120deg,#111b30,#172554);
    border: 1px solid #293750;
    border-radius: 16px;
}

.deployment h2 {
    font-size: 20px;
    margin-bottom: 22px;
}

.steps {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 15px;
}

.step {
    border-left: 2px solid #8b5cf6;
    padding: 5px 0 5px 15px;
}

.step strong {
    display: block;
    font-size: 13px;
    margin-bottom: 7px;
}

.step small {
    color: #94a3b8;
    font-size: 11px;
}

/* Footer */
footer {
    margin-top: 55px;
    border-top: 1px solid rgba(255,255,255,.08);
    padding: 28px 10px;
    text-align: center;
    color: #64748b;
    font-size: 12px;
    line-height: 2;
}

footer strong {
    color: #a78bfa;
}

/* Responsive */
@media(max-width: 768px) {
    .hero {
        padding: 30px 23px;
    }

    .hero h1 {
        font-size: 29px;
    }

    .hero::before {
        right: 0;
        font-size: 110px;
    }

    .grid {
        grid-template-columns: repeat(2,1fr);
    }

    .steps {
        grid-template-columns: repeat(2,1fr);
    }

    .container {
        padding-top: 30px;
    }
}

@media(max-width: 480px) {
    .grid, .steps {
        grid-template-columns: 1fr;
    }

    .navbar {
        padding: 16px 5%;
    }

    .brand h2 {
        font-size: 15px;
    }

    .nav-status {
        font-size: 10px;
    }

    .hero h1 {
        font-size: 25px;
    }

    .url-text {
        font-size: 13px;
    }
}
</style>
</head>

<body>

<div class="background"></div>

<!-- NAVIGATION -->
<nav class="navbar">

    <div class="brand">
        <div class="brand-icon">☁</div>
        <div>
            <h2>PHP CLOUD APP</h2>
            <small>OPENSHIFT DEPLOYMENT</small>
        </div>
    </div>

    <div class="nav-status">
        ● APPLICATION LIVE
    </div>

</nav>

<main class="container">

    <!-- HERO -->
    <section class="hero">

        <div class="tag">✦ SUCCESSFULLY DEPLOYED</div>

        <h1>
            Hello, <?php echo htmlspecialchars($owner); ?>!
            <br>
            Welcome to the <span>Cloud.</span>
        </h1>

        <p>
            A PHP application running on Red Hat OpenShift.
            Built with simplicity, deployed to the cloud,
            and ready to showcase the power of modern container-based hosting.
        </p>

        <div class="hero-info">
            <span>🐘 PHP <?php echo htmlspecialchars($phpVersion); ?></span>
            <span>☁ OpenShift Platform</span>
            <span>🚀 Version <?php echo htmlspecialchars($appVersion); ?></span>
        </div>

    </section>

    <!-- APPLICATION URL -->
    <section class="url-card">

        <div class="url-label">🌐 APPLICATION ACCESS URL</div>

        <div class="url-content">

            <div class="url-text">
                <?php echo htmlspecialchars($appUrl); ?>
            </div>

            <div class="url-badge">
                ● ACCESSIBLE
            </div>

        </div>

    </section>

    <!-- DASHBOARD -->
    <div class="section-heading">
        <h2>⚡ Deployment Dashboard</h2>
        <p>Application runtime and deployment information</p>
    </div>

    <section class="grid">

        <div class="card">
            <div class="card-icon green">🟢</div>
            <h3>Application Status</h3>
            <div class="value">Running</div>
            <p>PHP application is responding to this request.</p>
        </div>

        <div class="card">
            <div class="card-icon purple">🐘</div>
            <h3>PHP Runtime</h3>
            <div class="value">
                <?php echo htmlspecialchars($phpVersion); ?>
            </div>
            <p>Server-side scripting environment.</p>
        </div>

        <div class="card">
            <div class="card-icon blue">☁️</div>
            <h3>Hosting Platform</h3>
            <div class="value">OpenShift</div>
            <p>Container-based application hosting platform.</p>
        </div>

        <div class="card">
            <div class="card-icon orange">📦</div>
            <h3>Application Version</h3>
            <div class="value">
                <?php echo htmlspecialchars($appVersion); ?>
            </div>
            <p>Current application release.</p>
        </div>

        <div class="card">
            <div class="card-icon pink">👩‍💻</div>
            <h3>Application Owner</h3>
            <div class="value">
                <?php echo htmlspecialchars($owner); ?>
            </div>
            <p>Application developer and owner.</p>
        </div>

        <div class="card">
            <div class="card-icon cyan">🕒</div>
            <h3>Server Time</h3>
            <div class="value" style="font-size:17px">
                <?php echo htmlspecialchars($serverTime); ?>
            </div>
            <p>Current server date and time.</p>
        </div>

    </section>

    <!-- DEPLOYMENT JOURNEY -->
    <section class="deployment">

        <h2>🚀 From Code to Cloud</h2>

        <div class="steps">

            <div class="step">
                <strong>01. Development</strong>
                <small>PHP application developed</small>
            </div>

            <div class="step">
                <strong>02. Containerization</strong>
                <small>Application packaged for hosting</small>
            </div>

            <div class="step">
                <strong>03. Deployment</strong>
                <small>Hosted on OpenShift</small>
            </div>

            <div class="step">
                <strong>04. Live Application</strong>
                <small>Application responding successfully</small>
            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer>

        <p>
            ENGINEERED WITH ❤️ BY
            <strong><?php echo htmlspecialchars($owner); ?></strong>
        </p>

        <p>
            Powered by PHP &nbsp;|&nbsp;
            Hosted on Red Hat OpenShift
        </p>

        <p>
            © <?php echo $currentYear; ?>
            <?php echo htmlspecialchars($appName); ?>.
            All rights reserved.
        </p>

    </footer>

</main>

</body>
</html>
