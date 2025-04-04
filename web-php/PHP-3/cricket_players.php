<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Cricket Players</title>
    <style>
        /* General Page Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            text-align: center;
            padding: 30px;
        }

        h2 {
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Table Styling */
        .table-container {
            width: 60%;
            margin: auto;
            overflow: hidden;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
            color: #333;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        th {
            background: #0072ff;
            color: white;
            font-size: 20px;
            letter-spacing: 1px;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #d1e7fd;
            cursor: pointer;
        }

        .team-image {
    width: 20%; /* Adjust percentage as needed */
    max-width: 200px; /* Limits the maximum width */
    height: auto;
    display: block;
    margin: 0 auto 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}



        /* Responsive Design */
        @media (max-width: 768px) {
            .table-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
<img src="https://static.vecteezy.com/system/resources/previews/027/912/268/non_2x/indian-cricket-team-with-national-flag-free-photo.jpg" alt="Indian Cricket Team" class="team-image">
<h2>Indian Cricket Players</h2>

    

    <div class="table-container">
        <table>
            <tr>
                <th>Sl. No</th>
                <th>Player Name</th>
            </tr>

            <?php
            // Step 1: Store player names in an array
            $players = array(
               "Rohit Sharma (Captain)",
               "Shubman Gill",
               "Virat Kohli",
               "Suryakumar Yadav",
               "KL Rahul",
               "Hardik Pandya",
               "Ravindra Jadeja",
               "Jasprit Bumrah",
               "Mohammed Shami",
               "Kuldeep Yadav"
              );

            // Step 2: Display the data in an HTML table
            foreach ($players as $index => $player) {
                echo "<tr>";
                echo "<td>" . ($index + 1) . "</td>";
                echo "<td>" . $player . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
