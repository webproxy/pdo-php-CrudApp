<!-- File: src/Template/Posts/index.ctp -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<style type="text/css">
.users-content{width:90%;}
table tr th, table tr td{font-size: 1.2rem;}
.row{ margin:20px 20px 20px 20px;width: 100%;}
.glyphicon{font-size: 20px;}
.glyphicon-plus{float: right;}
a.glyphicon{text-decoration: none;}
a.glyphicon-trash{margin-left: 10px;}
</style>
<h1>User List</h1>
<?php
session_start();
if(!empty($_SESSION['statusMsg'])){
    echo '<p>'.$_SESSION['statusMsg'].'</p>';
    unset($_SESSION['statusMsg']);
}
?>
<div class="row">
    <div class="panel panel-default users-content">
        <div class="panel-heading">Users <a href="add.php" class="glyphicon glyphicon-plus"></a></div>
        <table class="table">
            <tr>
                <th width="5%">#</th>
                <th width="20%">Name</th>
                <th width="30%">Email</th>
                <th width="20%">Phone</th>
                <th width="12%">Created</th>
                <th width="13%"></th>
            </tr>
            <?php
            include 'DB.php';
            $db = new DB();
            $users = $db->getRows('users',array('order_by'=>'id DESC'));
            if(!empty($users)){ $count = 0; foreach($users as $user){ $count++;?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['created']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $user['id']; ?>" class="glyphicon glyphicon-edit"></a>
                    <a href="action.php?action_type=delete&id=<?php echo $user['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure?');"></a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="4">No user(s) found......</td>
            <?php } ?>
        </table>
    </div>
</div>