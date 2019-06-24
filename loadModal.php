<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<?php

/*
 * On charge la modal grâce à un script
 * celui ce declenche grâce à la variable de session 'check'
 */
if (isset($_SESSION['check']) && $_SESSION['check'] == 1) {
    $_SESSION['check'] = 0;
    ?>
     <script src="assets/js/loadModal.js"></script>
<?php
}

if (isset($_SESSION['check']) && $_SESSION['check'] == 2) {
    $_SESSION['check'] = 0;
    ?>
    <script src="assets/js/loadModal.js"></script>
<?php }

if (isset($_SESSION['check']) && $_SESSION['check'] == 3) {
    $_SESSION['check'] = 0;
    ?>
    <script src="assets/js/loadModal.js"></script>
<?php }
?>


