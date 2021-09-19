<?php
require "db.php";
function countNotes(){
    $sql = "SELECT * FROM notes";
    $db =$GLOBALS['db'];
    if ($result=mysqli_query($db,$sql))
    {
        $rowcount=mysqli_num_rows($result);
        echo $rowcount;
        mysqli_free_result($result);
    }
    
}
function listNotes(){
    $sql = "SELECT * FROM notes";
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
function deleteNote($id){
    $db =$GLOBALS['db'];
    $sql = "DELETE FROM notes WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        echo '<script>window.location.replace("/note/list");</script>';
    } else {
        echo '<script>window.location.replace("/noteerror/' . $db->error .'");</script>';
    }

    //return $done;
}
function newNote($name, $content, $category, $tags){
    $db =$GLOBALS['db'];
    $name = $db->real_escape_string($name);
    $content = $db->real_escape_string($content);
    $tags = $db->real_escape_string($tags);
    $sql = "INSERT INTO notes (id, name, content, category, created_at, updated_at, tags)
            VALUES (NULL, '$name', '$content', '$category', NOW(), NOW(), '$tags')";
    if ($db->query($sql) === TRUE) {
        echo '<script>window.location.replace("/note/list");</script>';
    } else {
        echo '<script>window.location.replace("/noteerror/' . $db->error .'");</script>';
    }
    
    //return $done;
}
function updateNote($id, $name, $content, $category, $tags){
    $db =$GLOBALS['db'];
    $name = $db->real_escape_string($name);
    $content = $db->real_escape_string($content);
    $tags = $db->real_escape_string($tags);
    $time =date('Y-m-d H:i:s');
    $sql = "UPDATE notes SET name='$name', content='$content', category='$category', updated_at='$time', tags ='$tags'  WHERE id=$id";
    if ($db->query($sql) === TRUE) {
        echo '<script>window.location.replace("/note/list");</script>';
    } else {
        echo '<script>window.location.replace("/noteerror/' . $db->error .'");</script>';
    }
    
    //return $done;
}
function updateNoteRealtime($id, $content){
    $db =$GLOBALS['db'];
    $content = $db->real_escape_string($content);
    $time =date('Y-m-d H:i:s');
    $sql = "UPDATE notes SET content='$content', updated_at='$time' WHERE id=$id";
    $db->query($sql);
    if ($db->query($sql) === TRUE) {
        echo '<script>window.location.replace("/note/list");</script>';
    } else {
        echo '<script>window.location.replace("/noteerror/' . $db->error .'");</script>';
    }
    //return $done;
}
function getNoteName($id, $action){
    $sql = "SELECT * FROM notes WHERE id = $id";
    $db =$GLOBALS['db'];
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    return $row[$action];
}