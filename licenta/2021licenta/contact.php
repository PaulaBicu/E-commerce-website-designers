<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezal.el | skill, ability and knowledge in all kinds of crafts</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
include("header.php");
?>

    <section class="contact-section">
        <div class="container">
            <div class="contact-left">
                <h2>Contact</h2>

                <form action="">
                    <label for="name">Nume</label>
                    <input type="text" id="name" name="name">

                    <label for="name">Email</label>
                    <input type="text" id="email" name="email">

                    <label for="message">Mesaj</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>

                    <input type="submit" class="send-message-cta" value="Trimite mesaj">
                </form>
            </div>
            <div class="contact-right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1693.5491477573141!2d26.116301877723462!3d44.44959432670854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1f8ca0c098d35%3A0x2c6dcc3f24dd3835!2sStrada%20Viitorului%20138%2C%20Bucure%C8%99ti!5e0!3m2!1sen!2sro!4v1622282850280!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>
    </section>

    <?php
include("footer.php");
?>

</body>
</html>