<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>

    <link rel="stylesheet" href="style.css">
</head>


<body>

    <?php 
		include("connection.php");
		$query = "SELECT * FROM details";
		$result = mysqli_query($con, $query);
		
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query1 = "SELECT * FROM details WHERE id = $id";
			$result1 = mysqli_query($con, $query1);
			$row1 = mysqli_fetch_assoc($result1);
		}
    ?>
    
    <div class="container">
        

    
        <div class="add_edit">
            <div class="title_area">
                <?php
                    if(isset($_GET['id'])){
                        echo "<h2>Update Details</h2>";
                    }    
                    else{
                        echo "<h2>Add TODO Details</h2>";
                    }
                ?>
            </div>
    
            <div class="add_edit_form">
                <form action="action.php" method="post">
                    <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $row1['id']; } ?>">
    
                    <div class="field">
                        <label for="title">Title:</label>
                        <input type="text" name="title" value="<?php if(isset($_GET['id'])){ echo $row1['title']; } ?>">
                    </div>
    
                    <div class="field">
                        <label for="description">Description:</label>
                        <input type="text" name="description" value="<?php if(isset($_GET['id'])){ echo $row1['description']; } ?>">
                    </div>
    
                    <div class="field">
                        <label for="date" name="date">Date:</label>
                        <input type="date" name="date" value="<?php if(isset($_GET['id'])){ echo $row1['date']; } ?>">
                    </div>
    
                    <div class="field">
                        <label for="priority">Priority:</label>
                        <select name="priority" >
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select> 
                    </div>
    
                    <div class="field">
                        <input type="submit" name="<?php if(isset($_GET['id'])){ echo "update"; }else{ echo "add";} ?>" value="<?php if(isset($_GET['id'])){ echo "Update"; }else{ echo "Add";} ?>">
    
                    </div>
                </form>

                <?php
                    if (isset($_GET['success'])) {
                    $success = $_GET['success'];
                    if ($success === 'add') {
                    echo '<p>Data is added successfully!</p>';
                    } 
                    }
                ?>
            </div>
        </div>
		
		
		<div class="details_table">
            <h2>TODO LIST</h2>
        </div>

        <div class="details">
            <?php 
                $count =1;
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                
                    if($count %2 != 0){
                        echo "<div class='left'>";
            ?>

                <div class="detail_box">
                    <p><b>Title : <?php echo $row['title']; ?></b></p>
                    <p><b>Description : </b><?php echo $row['description']; ?></p>
                    <p><b>Due Date : </b><?php echo $row['date']; ?></p>
                    <p><b>Priority : </b><?php echo $row['priority']; ?></p>
                    
                    <div class="but">
                            <a class="edit" name="edit" href="todolist.php?id=<?php echo $id ?>"><button>Edit</button></a>
                            <a class="remove" href="action.php?id=<?php echo $id; ?>&action=delete"><button>Remove</button></a>
                    </div>
                </div>
            <?php 

                echo "</div>";
                }
                else{

                    echo "<div class='right'>";   
            ?>
                <div class="detail_box">
                    <p><b>Title : <?php echo $row['title']; ?></b></p>
                    <p><b>Description : </b><?php echo $row['description']; ?></p>
                    <p><b>Due Date : </b><?php echo $row['date']; ?></p>
                    <p><b>Priority : </b><?php echo $row['priority']; ?></p>
                    
                    <div class="but">
                            <a class="edit" name="edit" href="todolist.php?id=<?php echo $id ?>"><button>Edit</button></a>
                            <a class="remove" href="action.php?id=<?php echo $id; ?>&action=delete"><button>Remove</button></a>
                    </div>
                </div>
            <?php 

                echo "</div>";
                }

            }  
            ?>

        </div>
		
		
    </div>



</body>
</html>