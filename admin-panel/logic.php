<?php

    $conn = mysqli_connect('localhost', 'root', '', 'blogdb');
    if (!$conn) {
        die("error".mysqli_connect_error());
    }


    extract($_POST);


    // Insert data into database
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $emailid = $_POST["email"];
        $password = $_POST["password"];

        // $query = "insert into users (username, password) values('$username', '$password')";
        // $result = mysqli_query($conn, $query);
            $hash=password_hash($password, PASSWORD_DEFAULT);// making hashes of password
            $sql="INSERT INTO `signupuser`(`FirstName`, `LastName`, `Email_Id`, `password`, `date`) 
									VALUES ('$firstname','$lastname','$emailid','$hash', current_timestamp())";
            $result=mysqli_query($conn, $sql);
        // header('location:insert.php');

    }


    // Fetch data from database

    if (isset($_POST['readrecord'])) {
        
        $data = '<table class="table table-bordered table-striped">
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Edit Action</th>
                            <th scope="col">Delete Action</th>
                            </tr>';
        $query = "select * from signupuser";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            
            $number = 1;
            while ($rows = mysqli_fetch_array($result)) {            
                $data .= '<tr>
                <td scope="row">'.$number.'</td>        
                <td>'.$rows['FirstName'].'</td>
                <td>'.$rows['LastName'].'</td>
                <td>'.$rows['Email_Id'].'</td>
                <td>'.$rows['password'].'</td>
                <td>
                    <button onclick="GetUserDetail('.$rows['id'].')" class="btn btn-warning">Edit</button>
                </td>
                <td>
                    <button onclick="DeleteUser('.$rows['id'].')" class="btn btn-danger">Delete</button>
                </td>
                </tr>';
                $number++;
            }
        }
        $data .='</table>'; // close table tag
        echo $data;

    }

    

    // Delete record from database
    if(isset($_POST['deleteid'])){
        
        $userid = $_POST['deleteid'];
        $query = "DELETE FROM `signupuser` WHERE `signupuser`.`id` = '$userid'";
        mysqli_query($conn, $query);
    }



    // Update data

    // getting detail from database
    if (isset($_POST['id']) && isset($_POST['id']) != "") {

        $user_id = $_POST['id'];
        $query3 = "select * from signupuser where id= '$user_id' ";

        if (!$result = mysqli_query($conn, $query3)) {
            exit(mysqli_error());
        }

        $response = array();
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                $response = $row;
            }
        }else {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        // php has some built in function to handle json.
        // objects in php can be converted into json by using the php function json_encode()
        echo json_encode($response);
    }
    else {
        $response['status'] = 200;
        $response['message'] = "Invalid request!";
    }


    // updating the detail
    if (isset($_POST['hidden_user_id2'])) {
        $hidden_user_id = $_POST['hidden_user_id2'];
        $firstname = $_POST['firstname2'];
        $lastname = $_POST['lastname2'];
        $email = $_POST['email2'];
        $password = $_POST['password2'];

        $query = "UPDATE `signupuser` SET `FirstName`='$firstname', `LastName`='$lastname', `Email_Id`='$email', `password`='$password' WHERE `id`='$hidden_user_id'";
        $result = mysqli_query($conn, $query);
    }

?>