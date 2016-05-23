<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TestSolution</title>
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/manual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col s12 l4 offset-l4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        Title
                    </span>
                    <p>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="company_name" type="text" class="validate">
                                <label for="company_name">Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="company_money" type="text" class="validate">
                                <label for="company_money">Money</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="company_parent" type="text" class="validate">
                                <label for="company_parent">Parent</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <button class="btn" id="company_add">Add</button>
                            </div>
                            <div class="col s6">
                                <button class="btn" id="company_view">View</button>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="main-row">

    </div>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="js/manual.js" type="text/javascript"></script>
</body>

</html>