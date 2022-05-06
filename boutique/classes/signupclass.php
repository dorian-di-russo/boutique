<?php
require 'dbhclass.php';
class register extends dbh
{
    
    protected function CheckEmpy($login, $prenom, $nom, $password, $repassword, $email)
    {
        if (!empty($login) && !empty($prenom) && !empty($nom) &&  !empty($password) && !empty($repassword) && !empty($email)) {
            return true;
        } else {
            return false;
        }
    }



    public function userRegister($login, $prenom, $nom, $password, $repassword, $email)
    {
        // gestion des erreurs du formulaire
        if ($this->CheckEmpy($login, $prenom, $nom, $password, $repassword, $email)) {


            $errors = array();

            if ($password !== $repassword) {
                $errors[] = 'Password incorrect';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors = 'Veuillez entrez une adresse e-mail correcte';
            }

            
            
            
            
            $sql = 'SELECT email FROM utilisateurs where email = ? ';
            $query = $this->connection->prepare($sql);
            $query->execute([$email]);
            $emails = $query->FetchAll();

            if (count($emails) > 0) {
                $errors[] = 'Email déja prise';
            }

            $sql = 'SELECT login FROM utilisateurs where login = ? ';

            $query = $this->connection->prepare($sql);

            $query->execute([$login]);

            $logins = $query->FetchAll();
            if (count($logins) > 0) {
                $errors[] = 'login déja pris';
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo $error . '<br><br>';
                }
            } else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $sql  = 'insert into utilisateurs (login,password,email,prenom,nom) values (?,?,?,?,?);';
                $query = $this->connection->prepare($sql);
                $query->execute([$login, $hashedPwd, $email, $prenom, $nom]);
                echo 'Vous êtes inscrit';



            }
        } else {
            echo 'Remplissez tout les champs';
        }
            



    }

    public function userUpdate($login, $prenom, $nom, $password, $repassword, $email)
    {
        // gestion des erreurs du formulaire
        if ($this->CheckEmpy($login, $prenom, $nom, $password, $repassword, $email)) {


            $errors = array();

            if ($password !== $repassword) {
                $errors[] = 'Password incorrect';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors = 'Veuillez entrez une adresse e-mail correcte';
            }

            $sql = 'SELECT email FROM utilisateurs where email = ? ';

            $query = $this->connection->prepare($sql);

            $query->execute([$email]);

            $emails = $query->FetchAll();


            if (count($emails) > 0) {
                $errors[] = 'Email déja prise';
            }

            $sql = 'SELECT login FROM utilisateurs where login = ? ';

            $query = $this->connection->prepare($sql);

            $query->execute([$login]);

            $logins = $query->FetchAll();


            if (count($logins) > 0) {
                $errors[] = 'login déja pris';
            }


            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo $error . '<br><br>';
                }
            } else {

                $login = trim(htmlspecialchars($_POST['login']));
                $prenom = trim(htmlspecialchars($_POST['prenom']));
                $nom = trim(htmlspecialchars($_POST['nom']));
                $password = trim($_POST['password']);
                $repassword = trim($_POST['repassword']);
                $email = trim(htmlspecialchars($_POST['email']));
                $id = $_SESSION['id'];




                $password = password_hash($password, PASSWORD_DEFAULT);

                $sql  = "UPDATE utilisateurs SET login=?,password=?,email=?,prenom=?,nom=? WHERE id=?";


                $query = $this->connection->prepare($sql);

                $query->execute(array(
                    $login, $password, $email, $prenom, $nom, $id


                ));


                // if(isset($_SESSION['id'])){
                //     $request  = $this->connection->prepare("SELECT * FROM utilisateurs WHERE id = ?"); // requête
                //     $request->execute(array($_SESSION['id']));
                //     $user = $request->fetch();


                //         $stmt = $this->connection->prepare("UPDATE utilisateurs SET login = ?,password = ? , email = ? , prenom = ? ,nom = ?  WHERE id = ? ");
                //         $stmt->execute(array(
                //             $login, $_SESSION['id'],
                //             $password, $_SESSION['id'],
                //             $email, $_SESSION['id'],
                //             $prenom, $_SESSION['id'],
                //             $nom, $_SESSION['id']

                //     ));
                //         header('Location: profil.php?id=' . $_SESSION['id']);



                // }




                echo 'Vous avez modifiez votre profil';
            }
        } else {
            echo 'Remplissez tout les champs';
        }
    }


    // public function UpdatePdo($login, $password, $email, $prenom, $nom)
    // {


    //     $this->login = $login;
    //     $this->password = $password;
    //     $this->email = $email;
    //     $this->prenom = $prenom;
    //     $this->nom = $nom;


    //     try {

    //         $stmt = $this->connection->prepare("UPDATE utilisateurs SET `login` = :login, `password` = :password, `email` = :email, `firstname` = :firstname,`lastname` = :lastname  WHERE login= :login");

    //         $stmt->bindparam(":login", $login);
    //         $stmt->bindparam(":password", $password);
    //         $stmt->bindparam(":email", $email);
    //         $stmt->bindparam(":prenom", $prenom);
    //         $stmt->bindparam(":nom", $nom);

    //         $stmt->execute();

    //         return $stmt;
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }




    public function userlog($login, $email, $password)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM utilisateurs WHERE login=:login OR email=:email LIMIT 1"); // préparation requete
            $stmt->execute(array(':login' => $login, ':email' => $email));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($password, $userRow['password'])) {
                    $_SESSION['login'] = $userRow['login'];
                    $_SESSION['email'] = $userRow['email'];
                    $_SESSION['prenom'] = $userRow['prenom'];
                    $_SESSION['nom'] = $userRow['nom'];
                    $_SESSION['id'] = $userRow['id'];



                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['login'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['login']);
        return true;
    }


    public function  GetAllInfosPdo($login)
    {
        // $AllInfos =         var_dump($_SESSION);

        try {

            $stmt = $this->connection->prepare("SELECT * FROM utilisateurs WHERE login = :login");

            $stmt->bindValue(':login', $login);

            $stmt->execute();

            $infos = $stmt->fetchAll();

            // On affiche chaque recette une à une
            foreach ($infos as $info) {

?>

                <td><?php echo $info['login'] . '<br>'; ?></td>
                <td><?php echo $info['prenom'] . '<br>'; ?></td>
                <td><?php echo $info['nom'] . '<br>'; ?></td>
                <td><?php echo $info['email']; ?></td>


<?php
            }

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function addarticle()
    {
    }
}



// class Signup  {
//     public function __construct(
//         $dbhost = "localhost",
//         $dbname = "boutique",
//         $username = "root",
//         $password    = ""
//     ) {

//          {

//             try {

//                 $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
//                 $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                 $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//             } catch (Exception $e) {
//                 throw new Exception($e->getMessage());
//             }
//         }
//     }

//     public function setUser($login,$email,$password,$prenom,$nom ) {

//         $stmt = $this->connection->prepare('INSERT INTO utilisateurs (login,email,password,nom,prenom) VALUES(?,?,?,?,?)');

//         $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


//         if(!$stmt->execute(array($login,$email,$hashedPwd,$prenom,$nom))) {
//             $stmt = null;
//             header("Location: ../index.php?error=stmtfailed");
//             exit();
//         }

//         if ($stmt->rowCount()    > 0) {
//             $resultCheck = false; 
//         }
//         else {
//             $resultCheck = true;
//         }

//         return $resultCheck;
//     }

//     public function checkUser($login,$email) {
//         $stmt = $this->connection->prepare('SELECT login FROM utilisateurs WHERE login = ? OR email = ?;');

//         if(!$stmt->execute(array($login,$email))) {
//             $stmt = null;
//             header("Location: ../index.php?error=stmtfailed");
//             exit();
//         }

//         if ($stmt->rowCount() > 0) {
//             $resultCheck = false; 
//         }
//         else {
//             $resultCheck = true;
//         }

//         return $resultCheck;
//     }
// }




?>