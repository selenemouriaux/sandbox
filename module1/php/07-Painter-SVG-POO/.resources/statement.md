# Painter SVG
## Présentation
Nous allons écrire un script PHP qui va dessiner des formes géométriques grâce à la technologie SVG.
Tout en ayant un premier aperçu du SVG, le projet nous permettra d'aborder une bonne partie de toutes les concepts
fondamentaux de la Programmation Orientée Objet en PHP.

## Objectifs padégogiques 

* Découvrir le SVG
* Appréhender la Programmation Orientée Objet, et notamment les notions suivantes :
    * objet, instance
    * classe
    * propriété 
    * méthode
    * visibilité
    * encapsulation
    * $this
    * opérateur de résolution de portée
    * constructeur, méthodes magiques
    * héritage
    * surcharge
    * abstraction
    * composition 
    * polymorphisme
    * interface
    * trait
    
## Méthodologie de travail


## Sprint #1
### Mission 1
Pour le ***premier sprint***, on va commencer par s'intéresser au ***SVG***. Puisqu'on va le manipuler,
il faut savoir à minima comment cet outil fonctionne. Il va falloir appréhender la manière de créer les ***formes 
géométriques*** suivantes : 

* Rectangle
* Carré
* Ellipse
* Cercle

Et en **bonus**:
* Triangle (quelconque) 
* Polygone (irrégulier)

Les ***caractéristiques*** des formes auxquelles on s'intéressera : 

* la position
* la taille
* la couleur
* l'opacité.

### Mission 2
Une fois vues les bases du SVG, le but ici sera d'écrire des ***fonctions PHP*** capables de 
générer le code source SVG des formes géométriques précitées. On veut pouvoir décider 
pour chaque forme géométrique de sa couleur, de son opacité, de sa position et de ses dimensions.

Par exemple pour générer le code SVG permettant d'afficher un rectangle, on définira une fonction
**genRectangle()** qui prendra les paramètres nécessaires pour faire varier toutes ses caractéristiques.

Comme toujours on se demandera :

* Quels sont les données nécessaires pour que la fonction fasse son travai ? Que dois-je lui donner en ***paramètre*** ?
* Quel est précisément le ***travail*** que je souhaite qu'elle effectue ? Quelle sera sa ***mission*** ?
* Quel résultat je souhaite que la fonction me retourne ? 

### Indications 
* On rangera les fonctions dans un fichier `functions.php` dans lequel on mettra toutes les fonctions que l'on sera amenés à créer. 
* On fera en sorte qu'il y ait le moins de code PHP possible dans le fichier de template`index.phtml`. 

### Bonus
On va devoir générer des balises SVG avec un certain nombre d'attribtus. Des chaînes de caractères complexes,
qui contiennent des quotes. On peut s'épargnr le travail de la concaténation à chaque fois. Créons une fonction
`genTag()` qui serait capable de créer une balise avec tous les attributs souhaités. 

##### Astuce
Les fonctions `array_map()` et `array_keys()` pourraient être utiles pour ce bonus ! Si vous ne les connaissez pas c'est 
l'cossaion de les découvrir. Mais attention, `array_map()` n'est pas si facile à appréhender !

## Sprint #2
Une fois les fonctions crées, on abordera la notion de ***classe*** et d'***objets*** afin de construire des classes 
pour chaque forme géométrique, en commençant par le rectangle. Lorsqu'on va créer une classe d'objets, 
on va se demander : 
* Quelles sont les ***caractéristiques*** des objets que cette classe va créer ?
* Quelles sont les ***actions*** que l'on souhaite pouvoir faire sur ou avec les objets de la classe ?

Chaque classe va donc remplacer la fonction associée à la même forme : la classe **Rectangle** va remplacer la fonction **genRectangle()**.

#### Indications
* On prendra soin de ranger chaque classe PHP dans un fichier portant le nom de la classe. 
* Le nom des classes commencera par convention par une majuscule, par exemple la classe **Rectangle**
sera rangée dans le fichier **Rectangle.php**.
* Ne pas oublier d'inclure les fichiers de classes au début du script (attention à l'ordre)
* On a juste changé l'organisation du code, on est passé du mode fonctionnel au mode objet, mais le résultat final lui reste le même. Ce sera
également le cas pour les sprints suivants. 

## Sprint #3
Refactoring suivant : prenons du recul sur notre code et posons-nous la question la suivante :
 *Y a-t-il des bouts de code qui se répètent dans toutes mes classes ?*
 
Le but ici sera d'éviter de répéter du code. Pour cela, il va falloir regrouper le code commun. 
Plusieurs outils vont nous servir : 
* l'***héritage***, la ***surcharge***
* la ***composition***
* l'***abstraction***

## Sprint #4
Notre code est maintenant optimisé, il n'y a plus de répétitions.

Le prochain défi - et pas des moindres - est d'organiser le code de manière à ce que la logique géométrique 
soit complètement dissociée de l'affichage, c'est-à-dire de la génération du SVG. Séparer la mécanique de l'affichage 
va permettre de le rendre indépendant du reste du code. Si demain on souhaite changer d'outil pour l'affichage,
il n'y aura pas besoin de refaire tout le code : seulement ce qui concerne l'affichage. 

On retrouvera cette logique très souvent en Programmation Orientée Objet, notamment dans les frameworks PHP,
où toutes les pièces de la mécanique sont séparées les unes des autres. 

Il va donc s'agir de créer une classe spécialement dédiée à la création des balises SVG. Toute la 
difficulté, et c'est aussi ce qui est passionnant avec la POO, va être de faire communiquer tous les éléments entre eux.

## Sprint #5
Maintenant que l'affichage est géré par une classe à part, on commenc eà avoir un code vraiment bien 
organisé. Par contre si on regarde l'index.php... il y a beaucoup de code. L'index.php est la porte d'entrée
de l'application. On doit faire en sorte que le hall d'entrée soit dégagé. Un index.php ne doit comporter idéalement que 
quelques lignes de code. On va donc encapsuler tout ce qui s'y trouve dans une classe qui jouera le rôle de classe principale 
de l'application. 

## Sprint #6 
Tous nos fichiers de classes doivent être inclus pour que PHP connaissent ces classes et que nous puissions ensuite les utilisons dans notre code.
L'ordre d'inclusion est important. On imagine mal comment s'en sortir sur une grosse application professionnelle 
qui comporte des centaines de classes ! On va donc utiliser un outil de PHP qui va résoudre le problème : l'autoloading.

Nous allons utiliser cet autoloading pour créer un autoloader qui va charger automatiquement les fichiers de classe PHP !

Comme nous travaillons en POO, autant créer une classe Autoloader qui va gérer l'autoloading !

## Sprint #6 bis
Une alternative à la création d'une classe d'autoloading est d'utiliser l'autoloader de composer.
COmposer est un gestionnaire de paquets, c'est-à-dire qu'il permet de gérer le téélchargement de librairies externes. 
Il gère également l'autoloading de ces librairies et il est également possible de l'utiliser pour charger nos propres 
classes. Il va falloir pour cela respecter la norme PSR-4 et ranger nos classes dans des ***namespaces***. 

## Sprint #7
Le sprint 7 est un sprint bonus qui va permettre de découvrir 2 nouvelles notions supplémentaires en POO :
* Les ***interfaces***
* Les ***traits***

Il est intéressant de créer une interface pour la classe SvgRenderer, afin que celle-ci soit contrainte d'implémenter certaines méthodes. 

Un trait est une boîte à outil qui va venir se greffer à une ou plusieurs classes. C'est un outil qui ve permettre de pallier en 
partie au fait qu'il n'existe pas d'héritage multiple en PHP. On pourra créer ici un trait pour y ranger les fonctions utilitaires. 

# Aperçu du résultat
![Capture 1](.resources/img/capture-1.png)