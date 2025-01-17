<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksamens</title>
</head>
<body>
    
    <?php $users = $db->getAllUsers(); ?>

        <form method="POST" action="">
            <div>
                <?php if (isset($errors['name'])): ?>
                    <p style="color: red;"><?php echo $errors['name'] ?></p>
                <?php endif; ?>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name ?? '' ?>">
            
                <?php if (isset($errors['lastname'])): ?>
                    <p style="color: red;"><?php echo $errors['lastname'] ?></p>
                <?php endif; ?>

                <label for="lastname">last name:</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo $lastname ?? '' ?>">
            
                <?php if (isset($errors['date_of_birth'])): ?>
                    <p style="color: red;"><?php echo $errors['date_of_birth'] ?></p>
                <?php endif; ?>

                <label for="date_of_birth">date_of_birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth ?? '' ?>">
            
                <?php if (isset($errors['email'])): ?>
                    <p style="color: red;"><?php echo $errors['email'] ?></p>
                <?php endif; ?>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email ?? '' ?>">
              
                <?php if (isset($errors['password'])): ?>
                    <p style="color: red;"><?php echo $errors['password'] ?></p>
                <?php endif; ?>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
            
                <?php if (isset($errors['number'])): ?>
                    <p style="color: red;"><?php echo $errors['number'] ?></p>
                <?php endif; ?>

                <label for="number">Number:</label>
                <input type="text" id="number" name="number" value="<?php echo $number ?? '' ?>">
            
                <?php if (isset($errors['gender'])): ?>
                    <p style="color: red;"><?php echo $errors['gender'] ?></p>
                <?php endif; ?>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="" disabled selected>Select gender</option>
                    <option value="male" <?php echo (isset($gender) && $gender === 'male') ? 'selected' : '' ?>>Male</option>
                    <option value="female" <?php echo (isset($gender) && $gender === 'female') ? 'selected' : '' ?>>Female</option>
                </select>
            
                <?php if (isset($errors['age'])): ?>
                    <p style="color: red;"><?php echo $errors['age'] ?></p>
                <?php endif; ?>

                <label for="age">Age:</label>
                <input type="text" id="age" name="age" value="<?php echo $age ?? '' ?>">
            
                <?php if (isset($errors['image'])): ?>
                    <p style="color: red;"><?php echo $errors['image'] ?></p>
                <?php endif; ?>

                <label for="image">image:</label>
                <input type="url" id="image" name="image" value="<?php echo $image ?? '' ?>">
            

                <button type="submit">Pievienot</button>
            </div>
        </form>
  

        <div>

        <?php foreach ($users as $user): ?>
            <div>
                <p>Name: <?php echo $user['first_name'] ?></p>
                <p>Last name: <?php echo $user['last_name'] ?></p>
                <p>Email: <?php echo $user['email'] ?></p>  
                <p>Number: <?php echo $user['number'] ?></p>
                <p>Gender: <?php echo $user['gender'] ?></p>
                <p>Age: <?php echo $user['age'] ?></p>
                <p>Date of birth: <?php echo $user['date_of_birth'] ?></p>
                <p>Image: <?php echo $user['image'] ?></p>
            </div>
        <?php endforeach; ?>
        </div>


</body>
</html>

