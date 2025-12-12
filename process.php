

<?php
// Simple form handler that shows a clean, styled confirmation.
// Save this file as process.php in same folder as index.html and style.css

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic sanitization
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Show a simple confirmation page that uses the same stylesheet
    ?>
    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width,initial-scale=1" />
      <title>Message received</title>
      <link rel="stylesheet" href="style.css" />
    </head>
    <body>
      <header class="site-header">
        <div class="container header-inner">
          <div class="brand">
            <h1>Abhishek Pal</h1>
          </div>
        </div>
      </header>

      <main>
        <section class="section">
          <div class="container">
            <div style="background:linear-gradient(180deg,#ffffff,#fbfbff);padding:28px;border-radius:18px;box-shadow:0 12px 30px rgba(2,6,23,0.08);text-align:center;">
              <h2>Thanks, <?php echo $name ? $name : 'there'; ?>!</h2>
              <p>I've received your message. Here's what you sent:</p>
              <div style="text-align:left;max-width:700px;margin:16px auto;font-size:15px;color:var(--muted);">
                <p><strong>Email:</strong> <?php echo $email ? $email : '—'; ?></p>
                <p><strong>Message:</strong></p>
                <p style="background:rgba(255,255,255,0.6);padding:12px;border-radius:12px;color:var(--text)"><?php echo nl2br($message ? $message : '—'); ?></p>
              </div>

              <a class="btn" href="index.html" style="margin-top:12px;display:inline-block;">Back to site</a>
            </div>
          </div>
        </section>
      </main>

      <footer class="site-footer">
        <div class="container">
          <p>© <?php echo date('Y'); ?> Abhishek Pal</p>
        </div>
      </footer>
    </body>
    </html>

    <?php
} else {
    // If user opens process.php directly, redirect to home
    header("Location: index.html");
    exit;
}
?>
