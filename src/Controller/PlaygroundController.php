<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\Null_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PlaygroundController extends AbstractController
{
    /**
     * @Route("/playground", name="playground")
     */
    public function index()
    {
        echo "so what";
        return $this->render('playground/index.html.twig', [
            'controller_name' => 'PlaygroundController',
        ]);
    }

    /**
     * @Route("/playground/intro", name="intro")
     */
    public function intro()
    {
        
        echo "<h1>Introduction au langage PHP</h1>";
        print 'Bonjour le monde, je veux devenir un <b>pro</b> du PHP <br>';
        echo "la différence entre 'print' et 'echo' est que 'print' aura une valeur de retour qui vaudra 1 alors que 'echo' ne renvoie rien <br>";

        return $this->render('playground/index.html.twig', [
            'controller_name' => 'INTRO',
        ]);
    }

        /**
     * @Route("/playground/variables", name="variables")
     */
    public function variables()
    {
        
        echo "<h1>Les variables</h1>";
        $prenom = "roger";
        $age = 56;
        echo "$prenom a $age ans.<br>";
        echo "Quand on utilise les guillemets, pas besoin de concaténer avec des points.<br>";
        $heure = getdate();
        print_r($heure);
        echo "<br>" . gettype($heure);
        echo "<br>Je suis $prenom<br>";
        $nombre = 2;
        echo "$nombre<br>";
        $nombre = $nombre**4;
        echo "$nombre<br>";

        return $this->render('playground/index.html.twig', [
            'controller_name' => 'variables',
        ]);
    }

    /**
    * @Route("/playground/structures", name="structures")
    */
    public function structures()
    {
        
        echo "<h1>Les structures de contrôle</h1>";
        $age = 18;
        if ($age >= 18) {
            echo "Vous êtes majeur.<br>";
        } elseif ($age < 12) {
            echo "T'es un gamin! <br>";
        } else {
            echo "Tu es mineur.<br>";
        }
        var_dump($age);
        echo "<br>";
        $test = $age < 10 ? "true" : false;
        var_dump($test);
        echo "<br>";
        echo "opérateur spaceship <=> fait un test de valeur entre 2 nombres <br>
        si le premier est plus petit que le second, l'opérateur renvoie -1. <br>";
        $nbreA = 5;
        $nbreB = 5;
        echo $nbreA<=>$nbreB;
        echo "<br>";
        echo "opérateur fusion null ?? renvoie l'opérande de droite si celui de gauche est NULL, sinon l'opérande de gauche <br>";
        $val1 = 1;
        $val2 = "droite";
        echo $val1??$val2;
        echo "<br>";
        return $this->render('playground/index.html.twig', [
            'controller_name' => 'contrôle',
        ]);
    }

    /**
    * @Route("/playground/structures/operateurslogiques", name="operateurslogiques")
    */
    public function operateursLogiques() {
        echo "<h2>Les opérateurs logiques</h2>";
        $x = 4;
        $y = -12;
        if(!$x>=0 AND !$y>=0) { echo "Ce texte est toujours affiché !<br>"; }
        // à la différence avec (!($x>=0)), qui va inverser le bool de ($x>=0) et donc donner la priorité à ce qui est entre parenthèses, soit ($x>=0), le terme !$x>=0 donne la priorité à !$x qui renvoie false. L'équation devient donc if(false>=0), or false = 0 (comme true = 1), et donc (0 >= 0) est vrai et renvoie true.
        // Si on avait simplement $x>=0, cela renverrait simplement true
        var_dump(!$x>=0 AND !$y>=0);
        var_dump(!$x>=0);   // true
        var_dump(!($x>=0));   // true
        var_dump($x>=0);    // false
        var_dump(!$y>=0);   // true
        var_dump($y>=0);    // false
        var_dump(!$x);      // false
        var_dump($x);       // int(4)
        var_dump(!$y);      // false
        var_dump($y);       // int(-12)
        return $this->render('playground/index.html.twig', [
            'controller_name' => 'Structures: opérateurs logiques.',
        ]);
    }
    /**
     * @Route("playground/switch", name="switch")
     */
    public function switch() {
        echo "<h2>Cas Switch</h2>";
        $x = 2;
        switch($x) {
            case 0:
                echo "X vaut 0<br>";
                break;
            case 1:
                echo "X vaut 1<br>";
                break;
            case 2:
                echo "X vaut 2<br>";
                break;
            default:
                echo "X n'est pas repris<br>";
        }
        // page 100
        return $this->render("playground/index.html.twig", ["controller_name"=>"Switch Case"]);
    }

    /**
     * @Route("playground/include", name="include")
     */
    public function includes() {
        echo "<h2>Include et require</h2>";
        echo "<h3>Différence entre include et require</h3>";
        echo "<p>Elle se situe dans la réponse du PHP dans le cas où le fichier ne peut pas être inclus pour une quelconque raison</p>
        <ul>
            <li>Si l'inclusion a été tentée avec include, PHP renverra un simple avertissement et le reste du script s'exécutera quand même.</li>
            <li>Si elle a été tentée avec require, une erreur fatale sera retournée et l'exécution du script s'arrêtera immédiatement.</li>
        </ul>";
        echo "<p><strong>REQUIRE est donc plus STRICT que INCLUDE</strong></p>";
        echo "<h3>Quid des versions avec <i>_once</i></h3>";
        echo "<p>Avec include et require, on peut inclure plusieurs fois un même fichier, ce qui n'est pas possible avec require_once ou include_once.</p>";
        
        return $this->render("playground/index.html.twig", ["controller_name"=>"includes"]);
    }

            /**
     * @Route("playground/fonctions", name="fonctions")
     */
    public function fonctions() {
        echo "<h1>Les fonctions</h1>";
        echo "<p>Attention: le nom des fonctions est INSENSIBLE à la casse: par exemple bonjour() ou bonJOUR() font référence à la même fonction.</br></p>";
        function bonjour() {
            echo "Bonjour à tous</br>";
        }
        bonjour();

        $nom = "Roger";
        function salutation($parametre) {
            echo "Bonjour $parametre !</br>";
        }
        salutation($nom);
        echo "<p>INFO: on parle de \"paramètre\" lors de la création d'une fonction et on nomme \"argument\" la valeur effective passée dans la fonctions.</p>";
        echo "<h2>Passer des arguments par référence</h2>";
        echo "<p>Quand on passe une variable comme argument par valeur à une fonction, le fait de modifier la valeur de la variable A L'INTERIEUR de la fonction NE MODIFIE PAS sa valeur à l'extérieur de la fonction.</br>Exemple:</p>";
        $x = 0;
        function plus3($para) {
            $para = $para + 3;
            echo "Valeur de X à l'intérieur de la fonction = $para <br>";
        }
        plus3($x);
        echo "La valeur de X en dehors de la fonction = $x </br>";
        echo "<p>Mais parfois, on voudra que nos fonctions puissent modifier la valeur des variables qu'on leur passe en argument, pour cela il faudra PASSER CES ARGUMENTS PAR REFERENCE <strong>DANS LA CONSTRUCTION DE LA FONCTION</strong>: il faudra simplement ajouter le signe & devant le paramètre en question entre les parenthèses.</p>";
        $y = 5;
        echo "La valeur de Y vaut $y </br>";
        function plus4(&$para) {
            $para = $para + 4;
            echo "Valeur de Y à l'intérieur de la fonction = $para <br>";
        }
        plus4($y);
        echo "La valeur de Y vaut $y </br>";
        echo "<h2>Définir des valeurs par défaut pour les paramètres</h2>";
        function bienvenue($prenom, $role='visiteur'){
            echo "Bienvenue $prenom, vous êtes un $role.</br>";
        }
        bienvenue("Roger");
        bienvenue("Tom", "admin");
        echo "<p>Attention ! si on définit une fonction avec plusieurs paramètres et qu'on décide de donner des valeurs par défaut à seulement certains d'entre eux, alors il faudra placer les paramètres qui ont une valeur par défaut après ceux qui n'en possèdent pas dans la définition de la fonction</p>";
        function defaut1($nom, $fonction, $lieu = "salle 3", $moment = "dans 1 heure") {
            echo "Bonjour $nom, vous serez le $fonction dans $lieu à $moment.</br>";
        }
        defaut1("Roger", "visiteur", "salle de controle");
        echo "<p>Il apparaît après des tests qu'il n'est pas possible de \"sauter\" un argument ('arg 1', 'arg 2', , 'arg 4') pour le remplacer par un argument par défaut dans une suite d'arguments par défaut<:br></p>";
        echo "<h2>Lancer une fonction un nombre indéfini suivant un nombre indéfini de paramètres</h2>";
        echo "<p>Pour cela, il suffit d'ajouter \"...\" avant la liste des paramètres DANS LA CONSTRUCTION DE LA FONCTION.</p>";
        function list1(...$noms) {
            foreach($noms as $item) {
                echo "bonjour $item </br>";
            }
            
        }
        list1("Roger", "Tom", "Nath");

        return $this->render("playground/index.html.twig", ["controller_name"=>"fonctions"]);
    }

    /**
     * @Route("playground/typage", name="typage")
     */
    public function typage() {
        echo "<h1>Le typage</h1>";
        echo "<p>PHP est un langage de typage faible: on n'a pas besoin de spécifier le type de données quand on définit des paramètres pour une fonction. Cela implique qu'il sera possible aussi de passer des arguments qui n'ont aucun sens dans une fonction et ceci sans même déclencher d'erreur.</p>
        <p>Cependant, PHP offre la possibilité de préciser le type de donnée attendue; si une donnée ne correspond pas, PHP tentera de la convertir dans le bon type et s'il n'y arrive pas, une erreur sera renvoyée.</p>
        <h2>Types de données</h2>
        <ul>
            <li>string</li>
            <li>int</li>
            <li>float (décimal)</li>
            <li>bool</li>
            <li>array</li>
            <li>iterable (argument de type array ou une instance de l'interface Traversable)</li>
            <li>callabe (fonction de rappel)</li>
            <li>nom de classe / d'interface (argument doit être une instance de la classe ou de l'interface donnée)</li>
            <li>self (argument doit être une instance de la même classe qui a défini la méthode</li>
            <li>object</li>
        </ul>
        <p>Certains types nous sont inconnus.</p>
        <h2>La typage strict</h2>
        <p>En utilisant le mode strict, les fonctions ne vont plus accepter que des arguments dont le type correspond exactement au type demandé dans leur définition. Attention, les entiers font partie des décimaux.</br>
        Pour ce faire, il faut activer le typage strict avec la structure de contrôle \"declare\" qui sert à ajouter des directives d'exécution dans un bloc de code. La directive qui nous intéresse est declare(strict_types= 1) <strong>qui soit impérativement être écrit en 1° ligne du fichier</strong>.</br>
        ATTENTION: le typage strict ne va s'appliquer que s'il est activé dans le fichier dans lequel la fonction est appelée: si on définit une fonction dans un premier fichier à typage strict activé puis que nous appelons cette fonction dans un autre fichier sans typage strict activé, le typage strict ne s'activera pas.</br>
        Enfin, le typage strict ne s'applique que sur les déclarations de type scalaire: soit string, int, float et bool.</p>";
        
        return $this->render("playground/index.html.twig", ["controller_name"=>"typage"]);
    }

    /**
     * @Route("playground/retour", name="retour")
     */
    public function retour(){
        echo "<h2>La valeur de retour <i>return</i>.</h2>
        <p>La structure de contrôle return va nous permettre de demander à une fonction de retourner un résultat <strong>qu’on va ensuite pouvoir stocker dans une variable</strong> ou autre pour le manipuler.</p>";
        // exemple de fonction avec valeur de retour et déclaration du typage de cette valeur de retour
        function mutlireturn($a, $b): int {
            return $a*$b;
        }
        $test1 = mutlireturn(2,5);
        echo $test1."</br>";
        $test2 = mutlireturn(3.3, 3.1);
        echo $test2."</br>";    // renvoie 10 car la sortie est typée int
        echo "<h2>La portée des variables</h2>
        <p>Pour faire très simple, vous pouvez considérer que les variables peuvent avoir deux portées différentes : soit une portée globale, soit une portée locale.</br>
        Toute variable définie à l’intérieur d’une fonction va avoir une portée locale à la fonction. Cela signifie que la variable ne sera accessible qu’au sein de la fonction et notre variable sera par ailleurs par défaut détruite dès la fin de l’exécution de la fonction.</p>";
        // utilisation d'une variable globale dans une fonction avec "global"
        $r = 0;
        function augm(){// ne fonctionne pas avec symfony (structure différente)
            global $r;
            echo "la valeur de r au début de la fonction: $r </br>";
            $r = $r+5;
        }
        augm();
        echo "variable r contient $r"; 
        echo "<h2>Le mot-clé <em>static</em></h2>
        <p>Une variable définie localement va être supprimée ou détruite dès la fin de l’exécution de la fonction dans laquelle elle a été définie.</br>
        Parfois, nous voudrons pouvoir conserver la valeur finale d’une variable locale pour pouvoir s’en resservir lors d’un prochain appel à la fonction. Cela va notamment être le cas pour des fonctions dont le but va être de compter quelque chose.</br>
        Pour qu’une fonction de « souvienne » de la dernière valeur d’une variable définie dans la fonction, nous allons pouvoir utiliser le mot clef static devant la déclaration initiale de la variable.</p>";
        function compteur(){
            static $x = 0;
            echo "variable X vaut $x </br>";
            $x++;
        }
        compteur();
        compteur();
        compteur();
        return $this->render("playground/index.html.twig", ["controller_name"=>"Valeur de retour"]);
    }

    /**
     * @Route("playground/constantes", name="constantes")
     */
    public function constantes(){
        echo "<h1>Constantes et constantes magiques PHP</h1>
        <p>Les constantes sont par défaut accessibles dans tout le script: on peut les définir n'importe où et y accéder depuis n'importe quel endroit.</br>
        <strong>Par convention elles sont écrites en majuscules.</br>
        De plus, il ne faut PAS préfixer une constante avec $.</strong></p>";
        define("ROGER", 50);
        echo ROGER; // ma constante ne commence pas par un $
        // const NOEL = 100; --> fonctionne en PHP mais pas dans ce cadre symfony
        echo "<h2>Les constantes prédéfinies.</h2>
        <p>Donnent des infos de type métadonnées.</br>
        Neuf d'entre elles sont appelées constantes <em>magiques</em>; leur valeur va changer en fonction de l'endroit dans le script où elles vont être utilisées: on les reconnaît facilement: leur nom commence et se termine par des doubles underscore.</p>
        <ul>
            <li>__FILE__ contient le chemin et le nom du fichier</li>
            <li>__DIR__ contient le nom du dossier qui contient le fichier</li>
            <li>__LINE__ contient le numéro de la ligne courante</li>
            <li>__FUNCTION__ contient le nom de la fonction actuellement définie ou {closure} pour les fonctions anonymes</li>
            <li>CLASS contient le nom de la classe actuellement définie</li>
            <li>METHOD contient le nom de la méthode actuellement utilisée</li>
            <li>__NAMESPACE__ contient le nom du namespace courant</li>
            <li>__TRAIT__ contient le nom du trait (incluant le nom du namespace dans lequel il a été déclaré</li>
            <li>ClassName::class contient le nom entièrement qualifié de la classe</li>
        </ul>";
        echo "Ceci est la ligne " . __LINE__ . "</br>"; 
        function test(){
            echo "Le nom de la fonction utilisée est: " . __FUNCTION__ . "</br>";
        }
        test();
        echo "<p>Les constantes magiques vont notamment être utiles pour récupérer des adresses de fichiers...</p>";
        return $this->render("playground/index.html.twig", ["controller_name"=>"Constantes"]);
    }

    /**
     * @Route("playground/tableaux", name="tableaux")
     */
    public function tableaux(){
        echo "<h1>Les tableaux</h1>";
        echo "<h2>Les tableaux indexés</h2>";
        $prenoms = array("Roger", "Jean", "José");
        echo "$prenoms[0] </br>";
        print_r($prenoms);
        $prenoms[] = "Nath";
        echo "</br>";
        print_r($prenoms);
        $villes = ["Verviers","Ensival","Spa"];
        echo "</br>";
        echo $villes[2];
        echo "</br>Pour boucler un tableau, il faut en déterminer sa longueur avec la <strong>méthode count()</strong></br>";
        for ($i=0; $i<count($villes);$i++) {
            echo $villes[$i] . "</br>";
        }
        echo "</br>";
        echo "Utilisation de la boucle foreach()</br>";
        foreach($prenoms as $item) {
            echo $item . "</br>";
        }
        echo "<h2>Les tableaux associatifs avec clef=>valeur</h2>";
        $ages = array("roger"=>56, "maël"=>2, "nath"=>25 );
        foreach($ages as $cle=>$valeur){
            if ($valeur<10) {
                echo $cle . " est un enfant.</br>";
            } else {
                echo $cle . " est un adulte.</br>";
            }
        }
        echo $ages["roger"];
        echo "<h2>Les tableaux multidimentionnels</h2>";
        // un tableau multidimensionnel composé de tableaux indexés
        $nombres = [
            [1, 2, 4, 8, 16],
            [1, 3, 9, 27, 81]
        ];
        echo $nombres[1][2] . "</br>";
        foreach ($nombres as $item) {
            foreach ($item as $sousitem) {
                echo $sousitem . "</br>";
            }
        }
        // un tableau multidimensionnel composé de tableaux associatifs + 1 valeur simple
        $utilisateurs = [
            ["nom"=>"roger", "ville"=>"spa"],
            ["nom"=>"nath", "ville"=>"xhoris"],
        //    "dominique"
        ];
        foreach ($utilisateurs as $datas) {
            foreach ($datas as $items=>$valeurs) {
                echo $items . " vaut " . $valeurs . "</br>";
            } 
        }
        // la 3° valeur "Dominique" va créer une exception warning car ce n'est pas une clé=>valeur
        echo "Print_r</br>";
        print_r($utilisateurs);
        echo "</br>";
        echo "var_dump</br>";
        var_dump($utilisateurs);
        // page 166
        return $this->render("playground/index.html.twig", ["controller_name"=>"Tableaux"]);
    }

    /**
     * @Route("playground/dates", name="dates")
     */
    public function dates() {
        echo "<h1>Manipuler des dates</h1>

        <h2>Le timestamp UNIX</h2>

        <p>Nombre de secondes écoulées depuis le 1° janvier 1970 jusqu'à une date donnée.</br>
        Il va servir par exemple à comparer deux dates.</br>
        Un autre intérêt est qu'il va être le même pour un moment donné quel que soit le fuseau horaire.</p>

        <h2>Obtenir un timestamp et le timestamp actuel en PHP</h2>

        <p>Pour le timestamp à la date actuelle, on utilise la fonction <em>time()</em></p>";
        print_r(time());
        echo "</br>";

        echo "<h3>Obtenir le timestamp d'une date donnée en PHP</h3>

        <p>Il existe 2 fonctions:</p>
        <ul>
            <li><em>mktime()</em> retourne le timestamp d'une date</li>
            <li><em>gmmktime()</em> retourne le timestamp d'une date GMT</li>
        </ul>";
        echo "Timestamp avec mktime(): " . mktime(). "</br>";
        echo "Timestamp avec gmmktime(): " . gmmktime(). "</br>";
        echo "<p>On peut leur passer une série de nombres en arguments; ces nombres vont constituer une date et vont représenter -dans l'ordre- les parties suivantes de la date dont on souhaite obtenir le timestamp</p>
        <ol>
            <li>heure</li>
            <li>minutes</li>
            <li>secondes</li>
            <li>jour</li>
            <li>mois</li>
            <li>année</li>
        </ol>";
        $temps1 = mktime(14,0,0,11,5,1980);
        $tempsgmt = gmmktime(14,0,0,11,5,1980);
        echo "Timestamp au 11 mai 1980 à 14 heures: (GMT+1) " . $temps1 . "</br>";
        echo "Timestamp au 11 mai 1980 à 14 heures: (GMT) " . $tempsgmt . "</br>";
        echo "... étrangement c'est la même chose chez moi sur mon pc, alors qu'il devrait y avoir une différence de 3600 secondes ... </br>
        Normalement, la fonction mktime() transforme mon heure en heure GMT avant de calculer le timestamp, gmmktime() par contre, considère l'heure que je lui donne comme une heure GMT.

        <h3>Obtenir un timestamp à partir d'une chaîne de caractères</h3>

        <p>Il faut utiliser la fonction <em>strtotime()</em> qui transforme une chaîne de caractères <strong>de format <em>date</em> ou <em>temps</em></strong> en timestamp. Attention donc au format qui sera passé en argument!</br>
        Les dates en argument devront être écrites en anglais. Les formats les plus courants sont (attention aux tirets et/ou virgules):
            <ul>
                <li>mm/dd/y</li>
                <li>y-mm-dd</li>
                <li>dd-mm-yy</li>
                <li>dd-mois y</li>
                <li>mois dd, y</li>
            </ul>
        </p>";
        echo strtotime("05/11/2000");
        echo "<p>On peut ajouter l'heure à cette date, sous le format 12:30:45</p>";
        echo strtotime("05/11/2000 12:30:45");
        echo "<p>D'autres formats sont acceptés comme par exemple, le nom d'un jour (sunday...), des moments (now, tomorrow...), notation ordinale, ago, avec des + et des -, ... voir documentation.</p>";
        echo strtotime("next monday 12:0:0");
        echo "</br>";
        echo strtotime("next monday 13:0:0");
        echo "</br>";
        echo strtotime("yesterday");

        echo "<h3>Obtenir une date à partir d'un timestamp</h3>";

        echo "<p>Avec la fonction <em>getdate()</em> qui prend un timestamp en argument.</p>";
        // test en print_r sur getdate()
        print_r(getdate(100005));
        echo "<p>La fonction retourne un tableau associatif.</p>";
        $present = getdate();
        foreach ($present as $cle=>$valeur){
            echo "La clé " . $cle . " possède la valeur " . $valeur . "</br>";
        }
        echo "Avec les clés mday = n° du jour dans le mois, wday = n° du jour de la semaine, mon = n° du mois, yday = n° du jour dans l'année"; 

        echo "<h2>Obtenir et formater une date en PHP.</h2>";

        echo "<h3>La fonction <em>date()</em> et les formats de date.</h3>";

        echo "<p>Cette fonction permet d'obtenir une date selon le format de notre choix.</br> Elle prend deux arguments:</p>";
        // echo "<ol><li>format de date souhaité, argument obligatoire</li><li>timestamp correspondant à la date qu'on souhaite retourner, argument optionnel</li></ol>
        // <p>Si le timestamp est omis, la date courante sera utilisée. Pour l'argument 1 (format de la date), il s'agit d'une série de caractères dans laquelle on choisit celui qu'on désire: chacun d'eux formate différemment la date. En voici un exemple:</p>";  
        echo date("l d m Y h:i:s", 500000000);
        echo "</br>";
        echo date("l d m Y h:i:s");
      
          echo "<h3>La gestion du décalage horaire.</h3>";

        // date() est sensé donner l'heure locale ...
        echo "date() est sensé donner l'heure locale: " . date("l d m Y h:i:s");
        echo "</br>";
        // ... alors que gmdate() est sensé donner l'heure gmt...
        // manifestement mon pc ne sait ni où il est ni quand il est ...
        echo "gmdate() est sensé donner l'heure gmt";

        return $this->render("playground/index.html.twig", ["controller_name"=>"Dates"]);
    }

    /**
     * @Route("playground/superglobales", name="superglobales")
     */
    public function superglobales(){
        echo "<h1>Les variables superglobales</h1>";
        echo "<p>Elles sont créées automatiquement par PHP et elles seront accessibles n'importe où dans le script.</br>
        Il y a 9 superglobales; ce sont des tableaux qui contiennent des groupes de variables très différentes.</br>
        Elle sont écrites en MAJUSCULES.</br>
        Toutes, sauf GLOBALS commencent avec un _underscore.</br>
        Les voici:</p>";
        echo '<ul>
                <li>$GLOBALS</li>
                <li>$_SERVER</li>
                <li>$_REQUEST</li>
                <li>$_GET</li>
                <li>$_POST</li>
                <li>$_FILES</li>
                <li>$_ENV</li>
                <li>$_COOKIE</li>
                <li>$_SESSION</li>
            </ul>';
        echo '<h2>Superglobale $GLOBALS</h2>';
        echo "<p>C'est un tableau associatif qui stocke automatiuqement toutes les variables globales déclarées dans le script.</br>
        Pour rappel, le mot clé <em>global</em> sert à accéder à une variable définie dans l'espace global depuis un espace local.</br>
        Ce mot-clé est lié au contenu de GLOBALS et souvent, il sera équivalent d'utiliser <em>global</em> ou GLOBALS pour accéder à une variable en particulier depuis un espace local.</p>";
        // voici un exemple d'utilisation (ne fonctionne pas sous symfony)
        $prenom = "Roger";
        $nom = "Noel";
        function presentation () {
            global $prenom, $nom; // ici on se donne accès aux variables globales
            echo "Je suis $prenom $nom.";
        }

        function presentation2(){
            echo "</br>Je suis $GLOBALS[prenom] $GLOBALS[nom]";
        }

        echo '<h2>Superglobale $_SERVER</h2>';
        echo "<p>Tableau associatif qui contient des variables définies par le serveur utilisé et aussi des infos relatives au script.</p>";
        //print_r($_SERVER);
        echo $_SERVER['PHP_SELF']."</br>";
        echo $_SERVER['SERVER_NAME']."</br>";
        //echo $_SERVER['SERVER_ADDR']."</br>";
        echo $_SERVER['REMOTE_ADDR']."</br>";
        echo $_SERVER['HTTPS']."</br>";
        echo $_SERVER['REQUEST_TIME']."</br>";

        echo '<h2>Superglobale $_REQUEST</h2>';
        echo "<p>Tableau associatif qui contient des variables envoyées via HTTP GET, HTTP POST et par les cookies HTTP.</p>";

        echo '<h2>Superglobale $_ENV</h2>';
        echo "<p>Tableau associatif qui contient des variables liées à l'environnement dans lequel s'exécute le script.</p>";
        echo $_ENV['APP_ENV']."</br>";
        //var_dump($_ENV);

        echo '<h2>Superglobale $FILES</h2>';
        echo "<p>Tableau qui contient des infos sur un fichier téléchargé. Elle est utile quand on affre la possibilité aux utilisateurs de nous envoyer des fichiers.</p>";
        //var_dump($_FILES);

        echo '<h2>Superglobale $_GET et $_POST</h2>';
        echo "<p>Utiles pour manipuler les infos envoyées via un formulaire. </p>";

        echo '<h2>Superglobale $_COOKIE</h2>';
        echo "<p>Tableau associatif qui contient toutes la variables passées via les cookies HTTP.</p>";

        echo '<h2>Superglobale $_SESSION</h2>';
        echo "<p>Tableau associatif qui contient toutes la variables de session.</p>";
        
        return $this->render("playground/index.html.twig", ["controller_name"=>"Superglobales"]);
    }
    /**
     * @Route("playground/cookies", name="cookies")
     */
    public function cookies(){
        echo "page 200";
        return $this->render("playground/index.html.twig", ["controller_name"=>"Cookies"]);
    }

}
