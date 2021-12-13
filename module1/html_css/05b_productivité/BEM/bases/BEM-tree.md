# arbre BEM:
*L'indentation représente l'imbrication dans le DOM*
PageWrapper
    SiteHeader
        SiteHeader-titles
            SiteHeader-h1
            SiteHeader-h2
    BodyLayout
        BodyLayout-mainContent
            MainContent
        BodyLayout-sidebar
        Sidebar
            Sidebar-item
                SmallBox.sticky
    SiteFooter

*Ici on peut voir 2 contradictions dans la structure DOM et BEM*
**Lignes 4 à 7**
* Dans le DOM SiteHeader-titles est parent de SiteHeader-h1 et SiteHeader-h2
* Alors qu'en BEM ils sont tous 3 enfants de SiteHeader

**Lignes 11 à 12**
* Dans le DOM Sidebar et BodyLayout-sidebar sont le même élement
* dans BEM le premier est enfant du 2ème
