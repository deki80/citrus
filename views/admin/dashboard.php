<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/views/media/css/dashboard.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Citrus Company Administration Page</a>
        </div>
    </div>
</nav>

<div class="dashboard">
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p>Welcome, <?= ucfirst($data['username']) ?></p>
                <p><a href="/administrator/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></p>
            </div>
            <div class="col-sm-10 text-left">
                <h3>Users Comments waiting approval</h3>
                <hr>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Text</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['comments'] as $comment): ?>
                        <tr>
                            <td><?= $comment['comment_name']; ?></td>
                            <td><?= $comment['comment_email']; ?></td>
                            <td><?= $comment['comment_text']; ?></td>
                            <td><?= $comment['comment_date']; ?></td>
                            <td><button onclick="approve(<?= $comment['comment_id'] ?>)" class="btn btn-primary">Approve</button></td>
                            <td><button onclick="deleted(<?= $comment['comment_id'] ?>)" class="btn btn-danger">Delete</button></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Citrus Systems, test by Dejan Tomić</p>
    </footer>
</div>


<script>
    function approve(id) {
        var formData = new FormData();
        formData.append('comment_id', id);
        fetch("/administrator/approve_comment", {
            method: "POST",
            body:  formData
        })
            .then(function(response){
                location.reload(true);
            })
    }

    function deleted(id) {
        var formData = new FormData();
        formData.append('comment_id', id);
        fetch("/administrator/delete_comment", {
            method: "POST",
            body:  formData
        })
            .then(function(response){
                location.reload(true);
            })
    }
</script>
</body>
</html>