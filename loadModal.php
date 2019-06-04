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
<?php } ?>