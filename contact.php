<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ewa.h.ilnicka@gmail.com";
    $email_subject = "New form submissions";

    function problem($error)
    {
        echo "Niestety formularz wydaje się zawierać błąd. ";
        echo "Poniżej znajdują się następujące błędy:<br><br>";
        echo $error . "<br><br>";
        echo "Proszę naciśnij 'Wstecz' i popraw wymienione błędy.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'Wprowadź proszę poprawny adres email.<br>';
    }

    $string_exp = "/^[A-Za-z .'-ąĄęĘżŻźŹóÓśŚćĆłŁ]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'Wprowadź proszę poprawne imię oraz nazwisko.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'Wprowadź proszę poprawną wiadomość.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    Dziękuję za wiadomość. W miarę możliwości postaram się szybko odpowiedzieć.

<?php
}
?>