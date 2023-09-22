Afin de créer un compte utilisateur, il faut se rendre sur : https://testparrotmerlin.000webhostapp.com/signup.php
et saisir le nom, le prénom, l'adresse email, le mot de passe et confirmer le mot de passe.

Pour se connecter, il faut juste aller sur : https://testparrotmerlin.000webhostapp.com/login.php

Pour l'exécution en local : 
- créer sa base de données SQL, changer les paramètres de la configuration de la base de 
données dans le répertoire config/db_connect.php qui se trouve à la racine du dépôt git ;
- la connexion se fait en utilisant la méthode mysqli ;
- une fois la base de données créée, il faut se rendre via le navigateur sur l'adresse de l'hôte et créer une 
compte via la page signup.php ;
- une fois le compte créé, vous serez redirigé vers login.php : il faudra entrer les identifiants ;

- depuis la page edit_img.php, il est possible de supprimer la photo d'un véhicule en cliquant sur cette dernière 
et en confirmant la suppression. La page edit_img.php. A partir de cette même page il est possible d'uploader 4 
photos au total est accessible depuis l'onglet 'Gérer les véhicules' depuis le dashboard administrateur ou employé 
et en cliquant sur le second icône à partir de la gauche représentant une peinture ;
- Il est possible d'avoir un aperçu des photos de la page details.php en cliquant dessus.
Il est possible d'avoir un aperçu de la photo de couverture d'un véhicule depuis la page cars