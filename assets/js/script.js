$(function () {
    //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
    $('#deleteModal').on('show.bs.modal', function (event) {
        //On stocke dans une variable le bouton qui appelle la modale.
        var button = $(event.relatedTarget);
        //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du user, son nom de famille et son prénom
        var userId = button.data('id');
        var userLastname = button.data('lastname');
        var userFirstname = button.data('firstname');
        var modal = $(this);
        /*
         * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
         * La fonction append permet de créer un élément dans l'élément apposé devant.
         * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
         */
        modal.find('.modal-body').empty().append('<p>Êtes-vous sûre de vouloir supprimer ' + userLastname + ' ' + userFirstname + ' ?</p>');
        modal.find('.modal-footer').empty().append('<a href="admin.php?deleteId=' + userId + '" class="btn btn-danger">Supprimer cette utilisateur</a>');
    });

    $('#deleteModalContent').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var contentId = button.data('id');
        var title = button.data('title');
        var modal = $(this);

        modal.find('.modal-body').empty().append('<p>Êtes-vous sûre de vouloir supprimer le contenu ayant pour titre ' + title + '.' + ' ?</p>');
        modal.find('.modal-footer').empty().append('<a href="admin.php?deleteId=' + contentId + '" class="btn btn-danger">Supprimer ce contenu</a>');
    });
    
        $('#deleteModalComment').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var contentId = button.data('id');
        var content = button.data('content');
        var modal = $(this);

        modal.find('.modal-body').empty().append('<p>Êtes-vous sûre de vouloir supprimer le contenu ayant pour contenu : ' + content + '.' + ' ?</p>');
        modal.find('.modal-footer').empty().append('<a href="admin.php?deleteId=' + contentId + '" class="btn btn-danger">Supprimer ce contenu</a>');
    });
});
