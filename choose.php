
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch profiles from the database
$sql = "SELECT name, email, link, photo FROM profiles";
$result = $conn->query($sql);

$profiles = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profiles[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Profile Selector</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        nav ul {
            text-align: center; 
            list-style: none;
             height: 100px;
             padding: 0;
                }

        nav ul li{
             display: inline-block;
             list-style: none;
             margin: 0;
            }

        nav ul li a{
            color: black;
            text-decoration: none;
            font-size: 18px;
         }

         #sidemenu li a {
    color: black;
    text-decoration: none;
    font-size: 18px;
    display: inline-block;
    padding: 10px 20px;
    background-color: #f4f4f4; 
    border: 1px #ccc; 
    border-radius: 5px; 
    transition: all 0.3s ease; /* Smooth transition */
  }

  #sidemenu li a:hover {
    color: white;
    background-color: #007BFF;
    transform: scale(1.1);
    border-color: #0056b3; 
  }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }

        .profile-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .profile {
            width: 180px;
            height: 210px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .profile:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile .name {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .profile .email {
            font-size: 14px;
            color: #888;
        }

        .add-profile {
            width: 180px;
            height: 210px;
            border: 1px dashed #ddd;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #aaa;
            cursor: pointer;
        }

        .guest-mode {
            margin-top: 20px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        .guest-mode:hover {
            text-decoration: underline;
        }

        .toggle-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .toggle {
            width: 40px;
            height: 20px;
            background-color: #ddd;
            border-radius: 20px;
            position: relative;
            margin-left: 10px;
            cursor: pointer;
        }

        .toggle::before {
            content: "";
            width: 18px;
            height: 18px;
            background-color: #fff;
            border-radius: 50%;
            position: absolute;
            top: 1px;
            left: 2px;
            transition: all 0.2s;
        }

        .toggle.active {
            background-color: #4caf50;
        }

        .toggle.active::before {
            left: 20px;
        }

        .add-profile-form {
            display: none;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .add-profile-form input {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
        }

        .add-profile-form button {
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-profile-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div id="header">
        <div class="container">
            <nav>
                
                <ul id="sidemenu">
                    <li><a href="logout.php">Logout</a></li>
                    <i class="fa-solid fa-xmark" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()"></i>
            </nav>
            </div>
        </div>



    <h1>Choose your Website?</h1>
    <p>Just choose which website you want and it will go to see the different designs and features of the manufacturer and be inspired.</p>

    <div class="profile-container" id="profileContainer">

    <div class="profile" onclick="selectProfile('Angelo')">
            <a href="eendex.html">
            <img src="HAGOS.jpg" alt="Profile">
            </a>
            <div class="name">Angelo</div>
            <div class="email">Angelo Hagos</div>
        </div>
        
        <?php foreach ($profiles as $profile): ?>
            <div class="profile" onclick="selectProfile('<?php echo $profile['name']; ?>')">
                <a href="<?php echo $profile['link']; ?>" target="_blank">
                    <img src="<?php echo $profile['photo']; ?>" alt="Profile">
                </a>
                <div class="name"><?php echo $profile['name']; ?></div>
                <div class="email"><?php echo $profile['email']; ?></div>
            </div>
        <?php endforeach; ?>
        <div class="add-profile" onclick="toggleAddProfileForm()">
            + Add Profile
        </div>
    </div>

    <div class="add-profile-form" id="addProfileForm">
    <form action="save_profile.php" method="POST" enctype="multipart/form-data">
        <input type="text" id="profileName" name="profileName" placeholder="Enter name" required>
        <input type="text" id="profileEmail" name="profileEmail" placeholder="Enter fullname" required>
        <input type="text" id="profileLink" name="profileLink" placeholder="Enter website link" required>
        <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" required>
        <button onclick="addProfile()">Save Profile</button>
    </form>
    </div>

    <script>
        function selectProfile(profileName) {
            alert(`Profile selected: ${profileName}`);
        }

        function toggleAddProfileForm() {
            const form = document.getElementById('addProfileForm');
            form.style.display = form.style.display === 'none' || form.style.display === '' ? 'flex' : 'none';
        }

        function addProfile() {
            const name = document.getElementById('profileName').value;
            const email = document.getElementById('profileEmail').value;
            const link = document.getElementById('profileLink').value;
            const photoInput = document.getElementById('profilePhoto');
            const photo = photoInput.files[0];

            if (name && email && link && photo) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const profileContainer = document.getElementById('profileContainer');

                    const newProfile = document.createElement('div');
                    newProfile.className = 'profile';
                    newProfile.onclick = () => selectProfile(name);

                    newProfile.innerHTML = `
                        <a href="${link}" target="_blank">
                            <img src="${e.target.result}" alt="Profile">
                        </a>
                        <div class="name">${name}</div>
                        <div class="email">${email}</div>
                    `;

                    profileContainer.insertBefore(newProfile, profileContainer.lastElementChild);

                    document.getElementById('addProfileForm').style.display = 'none';
                    document.getElementById('profileName').value = '';
                    document.getElementById('profileEmail').value = '';
                    document.getElementById('profileLink').value = '';
                    photoInput.value = '';
                };

                reader.readAsDataURL(photo);
            } else {
                alert('Please fill out all fields.');
            }
        }
    </script>
</body>
</html>
