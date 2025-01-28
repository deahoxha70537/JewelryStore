<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title>
</head>
<body>

 
    <table border="1">
     
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>

        <?php 

        include_once '../Repository/userRepository.php';

        $userRepository = new UserRepository();

        $users = $userRepository->getAllUsers(); 


        foreach($users as $user){
            echo 
            "
            <tr>
                <td>$user[Id]</td> <!-- ID e përdoruesit -->
                <td>$user[Name]</td> <!-- Emri i përdoruesit -->
                <td>$user[Surname]</td> <!-- Mbiemri i përdoruesit -->
                <td>$user[Email]</td> <!-- Email-i i përdoruesit -->
                <td>$user[Username]</td> <!-- Emri i përdoruesit për hyrje -->
                <td>$user[Password]</td> <!-- Fjalëkalimi i përdoruesit -->
                <td><a href='edit.php?id=$user[Id]'>Edit</a></td> <!-- Link për redaktim me ID -->
                <td><a href='delete.php?id=$user[Id]'>Delete</a></td> <!-- Link për fshirje me ID -->
            </tr>
            ";
        }
        ?>
    </table>
</body>
</html>