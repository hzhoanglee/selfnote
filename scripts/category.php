<?php
require "db.php";
function countCategories(){
    $sql = "SELECT * FROM categories";
    $db =$GLOBALS['db'];
    if ($result=mysqli_query($db,$sql))
    {
        $rowcount=mysqli_num_rows($result);
        echo $rowcount;
        mysqli_free_result($result);
    }
}
function listCategory(){
    $db =$GLOBALS['db'];
    $sql = "SELECT * FROM categories";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] .'</td>';
            echo '<td>' . $row["name"] .'</td>';
            if ($row["id"] != 0){
                echo '<td>
                       <div class="d-flex">
                             <a href="/category/view/' . $row["id"] .'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                             <a href="/category/edit/' . $row["id"] .'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                             <a href="/category/delete/' . $row["id"] .'" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                       </div>
                 </td>';
            } else{
                echo '<td>
                       <div class="d-flex">
                             <a href="/category/view/' . $row["id"] .'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                       </div>
                 </td>';
            }

                echo '</tr>';


        }
    } else {
        echo "0 results";
    }
    
}
function getCategoryList(){
    $db =$GLOBALS['db'];
    $sql = "SELECT * FROM categories";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row["id"] != 0){
                echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
            }
        }
    }
    
}
function getCategoryName($id){
    $sql = "SELECT * FROM categories where id = $id";
    $db =$GLOBALS['db'];
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    return $row["name"];
}
function updateCategoryName($id, $name){
    $db =$GLOBALS['db'];
    $name = $db->real_escape_string($name);
    $sql = "UPDATE categories SET name='$name' WHERE id=$id;";
    if ($db->query($sql) === TRUE) {
        echo '<script>window.location.replace("/category/list");</script>';
    } else {
        echo '<script>window.location.replace("/categoryerror/' . $db->error .'");</script>';
    }
    
    //return $done;
}
function deleteCategory($id){
    $db =$GLOBALS['db'];
    $sql = "DELETE FROM categories WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        echo '<script>window.location.replace("/category/list");</script>';
    } else {
        echo '<script>window.location.replace("/categoryerror/' . $db->error .'");</script>';
    }
    
    //return $done;
}
function newCategory($name){
    $db =$GLOBALS['db'];
    $name = $db->real_escape_string($name);
    $sql = "INSERT INTO categories (id, name)
            VALUES (NULL, '$name')";

    if ($db->query($sql) === TRUE) {
        echo '<script>window.location.replace("/category/list");</script>';
    } else {
        echo '<script>window.location.replace("/categoryerror/' . $db->error .'");</script>';
    }
    
    //return $done;
}
function listNoteofCategory($category){
    $sql = "SELECT * FROM notes where category = $category";
    $db =$GLOBALS['db'];
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] .'</td>';
            echo '<td><a href="/note/view/' . $row["id"] . '"> ' . $row["name"] .'</a></td>';
            echo '<td>' . getCategoryName($row["category"]) .'</td>';
            echo '<td>' . $row["created_at"] .'</td>';
            echo '<td>' . $row["updated_at"] .'</td>';
            echo '<td>' . $row["tags"] .'</td>';

            echo '<td>
                       <div class="d-flex">
                             <a href="/note/view/' . $row["id"] .'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                             <a href="/note/edit/' . $row["id"] .'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                             <a href="/note/delete/' . $row["id"] .'" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                       </div>
                 </td>';
            echo '</tr>';
        }
    } else {
        echo "0 results";
    }

}
function listNoteofCategoryDashboard($category){
    $sql = "SELECT * FROM notes where category = $category";
    $db =$GLOBALS['db'];
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td><a href="/note/view/' . $row["id"] . '"> ' . $row["name"] .'</a></td>';
            echo '<td>
                       <div class="d-flex">
                             <a href="/note/view/' . $row["id"] .'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                             <a href="/note/edit/' . $row["id"] .'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                             <a href="/note/delete/' . $row["id"] .'" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                       </div>
                 </td>';
            echo '</tr>';
        }
    } else {
        echo "0 results";
    }

}
function listCategoryDashboard(){
    $db =$GLOBALS['db'];
    $sql = "SELECT * FROM categories";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<a class="list-group-item list-group-item-action" id="list-'. $row["id"] .'-list" data-toggle="list" href="#list-'. $row["id"] .'" role="tab">'. $row["name"] .'</a>';
        }
    } else {
        echo "0 results";
    }
    $result -> free_result();
}
function listNotesDashboard(){
    $db =$GLOBALS['db'];
    $sql = "SELECT * FROM categories";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="tab-pane fade" id="list-'. $row["id"] .'" role="tabpanel">';
            echo '<div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>';
            listNoteofCategoryDashboard($row["id"]);
            echo'               </tbody>
                            </table>
                        </div>
                    </div>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }

}