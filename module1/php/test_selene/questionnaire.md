
### Question 1 : Quels sont les deux moyens de transporter des données dans une requête HTTP ?

* GET : modifie l'url pour passer les données après le "?" et séparées par un "&", cette méthode permet de ne pas avoir de double souission de formulaire mais affiche toutes les données en clair. On peut vite avoir une url de plusieurs kilomètres.
* POST : envoie les données du formulaire dans le "body" d'une requête avec un header qui permet une plus grande marge de manoeuvre mais qui nécessite de gérer le problème de double soumission du formulaire.

### Question 2 : Comment récupère-t-on les données transportées dans une requête HTTP en PHP ?

Avec la super globale liée au type de requête, à savoir :
* $_GET, pour une soumission de données en GET
* $_POST, pour une soumission de données en POST

### Question 3 : Qu’est-ce que la validation ? Quels sont les deux types de validation et quelle est leur principale différence ?

La validation permet d'assurer la sécurité et le bon fonctionnement du site en contraignant et/ou refusant si nécessaire, les informations non désirées voir dangereuses qu'un utilisateur pourrait tenter d'injecter dans le programme.
* HTML permet un certain nombre d'automatismes de protection en typant notamment les balises de saisie (email, text, nombres..), si cela peut être très pratique, ça reste un niveau de protection très faible pour quiconque sait les contourner.
* Assurer la validation des données soi même en créant des fonctions qui pré-traitentles données avant de les utiliser dans le coeur du programme avec notamment des conditions de validation définies par des regex, de la longueur de chaines, du respect de format....

### Question 4 : Que doit-on faire après avoir reçu et traité des données avec la méthode POST pour éviter de soumettre les données plusieurs fois ?

Pour éviter que les données soient soumises plusieurs fois suite à un POST, il faut faire un redirect avec un code 300 qui va modifier la méthode de POST en GET, de fait, une commande par exemple ne sera effectuée qu'une fois car au contraire de la méthode POST qui modifie des données, ce n'est pas dans les attributions de GET.

### Question 5 : Quel est le seul moyen de sécuriser les données transmises dans une requête qui navigue sur internet ?

Utiliser le protocole https et hacher les données ou les crypter

### Question 6 : Si on envoie les données d’un formulaire vers la même page que celle qui affiche le formulaire, quelle précaution doit-on prendre avant de traiter les données reçues ?

les sauvegarder pour faciliter la re-saisie ou la modification ?

### Question 7 : A quoi servent les attributs action et method de la balise <form> ?

* action : sert à définir un potentiel redirect à la soumission, que ce soit pour le traitement sur une page dédiée ou autre chose.
* method : sert à choisir la méthode de soumission, soit GET, soit POST à ma connaissance.

### Question 8 : Comment seront récupérées les données du formulaire ci-dessous côté serveur en PHP ?

Sans attribut 'name' je ne crois pas qu'il soit possible d'accéder à 'search-query' depuis le côté serveur.

### Question 9 : Lorsque l’on récupère les données d’un formulaire envoyées avec la méthode POST, à quoi correspondent les clés du tableau associatif contenu dans la variable superglobale $_POST ?

Dans la super globale $_POST, les clés du tableau associatif qui la composent sont tout simplement la liste des attributs name des valeurs soumises dans le formulaire soumis en POST. Leurs valeurs étant contenues dans la valeur correspondante du même tableau.

### Question 10 : Comment s’appelle la partie de l’URL qui peut contenir des données à transmettre au serveur ?

La partie de l'URL qui contient les données à transmettre se nomme la query il me semble.