<?php

session_Start();
require_once "db_config.php";

if(isset($_POST['submitInvite'])){
    if(str_contains($_POST['submitInvite'], '@')){
        $select_user_and_pass = "SELECT * from person where email = :email1";
    
        $login_query = $conn -> prepare($select_user_and_pass);
        $login_query -> bindValue(':email1',$_SESSION["member_login"]);
        $login_query -> execute();
        if($login_query -> rowCount() ==1){
            if($row = $login_query->fetch()){
                header('Location: emailes_meghivo.php?email='. $_SESSION["member_login"] . '&name='. $_SESSION["name"]. '&haztartas=' . $row["id_house_manage"]);
            }
        }

    }


    $select_user_and_pass = "SELECT * from person where email = :email1";
    
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$_SESSION["member_login"]);
    $login_query -> execute();


    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){
            $invited_person = $conn->prepare("SELECT * from person where name LIKE :name OR lname LIKE :lname");
            $exploded_name = explode(" ",$_POST["invitedPersonName"]);
            $invited_person->bindValue(":name",$exploded_name[0]);
            $invited_person->bindValue(":lname",$exploded_name[0]);
            $invited_person -> execute();
            if($invited_person -> rowCount() ==1){
                if($row1 = $invited_person->fetch()){

                    $create_invite = "INSERT INTO invite(house_manage_TO,inviter, invited_person ,accepted)
                    VALUES (:house_manage_TO1,:inviter1,:invited_person1,0)";
                    $query = $conn -> prepare($create_invite);
                    $query->bindValue('inviter1', $row["ID"]);
                    
                    $query->bindValue('invited_person1', $row1["ID"]);
        
                    $query->bindValue('house_manage_TO1', $row["id_house_manage"]);

                    if($query->execute()){
                        header('Location: ../Registered-user/utilities-expanses-insert.php?tagmeghivva=true');
                    }
                    else{
                        header('Location: ../Registered-user/utilities-expanses-insert.php?tagmeghivva=false');
                    }
                }
                else{
                    header('Location: ../Registered-user/utilities-expanses-insert.php?tagmeghivva=false');
                }
            }
            else{
                header('Location: ../Registered-user/utilities-expanses-insert.php?tagmeghivva=false');
            }

        }
        else{
            header('Location: ../Registered-user/utilities-expanses-insert.php?tagmeghivva=false');
        }
    }
    else{
        header('Location: ../Registered-user/utilities-expanses-insert.php?tagmeghivva=false');
    }
}

?>