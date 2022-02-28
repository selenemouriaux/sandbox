'use strict';

// const addArticlePage = '../../templates/admin/admin_article_add.phtml';
const select = document.querySelector('select');
const hiddenField = document.querySelector('#new_category');

select.addEventListener("change", function (e) {
    if (this.value === "Ajouter une catégorie") {
        confirm("Attention vous allez ajouter une nouvelle catégorie en base de données," +
            " voulez vous continuer ?" +
            "\n(la catégorie ne sera pas créée si l'article n'est pas conforme)") ?
            hiddenField.style.display = 'initial'
        :
        ""
        ;
    }
})
