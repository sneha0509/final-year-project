<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Style/home.css" />
    <style>
        .search {
            width: 100%;
            margin: auto;
            display: block;
            text-align: center;
            /* border: 0.1em solid;
            border-radius: 0.5rem; */
        }
    </style>
    <link rel="stylesheet" href="../Style/NewsandEventForm.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>

<body>
    <div id="Head"></div>
    <br />
    <div id="content">
        <div class="search">
            <input type="text" style="width:50%" placeholder="Search NGO...">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div><br />
        <div class="team" id="Team">
            <h1 align='center' class="recommended">List Of NGOs</h1><br />
            <div class="cards">
                <?php
                require('dbcon.php');
                $stmt = $pdo->prepare("select * FROM ngo_register");
                $stmt->execute();
                $users = $stmt->fetchAll();

                foreach ($users as $user) {
                ?>
                    <div class="card1" data-aos="zoom-in">
                        <div class="card-image">
                            <img src="../Image/about.jpg" />
                        </div>
                        <div class="card-content">
                            <h3><?php echo ucwords(strtolower($user['ngo_name'])); ?></h3><br />
                            <div class="join-button">
                                <a href="volunteer_form.php?id=<?php echo $user['ngoid']; ?>">
                                    <button class="join">Join us !</button>
                                </a>
                                <a href="#m<?php echo $user['ngoid']; ?>" data-toggle="modal">
                                    <button class="join">View Details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- View Details Modal -->
    <?php
    require('dbcon.php');
    $stmt = $pdo->prepare("select * FROM ngo_register");
    $stmt->execute();
    $users = $stmt->fetchAll();
    foreach ($users as $user) {
        echo $user['ngo_name'].'<br/>';
    ?>
        <div class="modal fade" id="m<?php echo $user['ngoid']; ?>">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content form-wrapper">
                    <div class="close-box" data-dismiss="modal">
                        <i class="fa fa-times fa-2x"></i>
                    </div>
                    <div class="container-fluid mt-5">
                        <!-- form tag -->
                        <form id="NewsandEventForm">
                            <div class="form-group text-center pb-2">
                                <h4><?php echo $user['ngo_name']?> </h4>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="Domain"> Domain</label>
                                    <input id="Domain" class="form-control" readonly value="<?php echo $user['ngo_domain']; ?>" >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="Founder"> Name of NGO Founder</label>
                                    <input id="Founder" class="form-control" readonly value="<?php echo $user['founder_name']; ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="mobile"> Contact no. </label>
                                    <input type="text" id="mobile" class="form-control" readonly value="<?php echo $user['mobile']; ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="Address"> Address</label>
                                    <input id="Address" class="form-control" readonly value="<?php echo $user['ngo_address']; ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="email"> NGO Email</label>
                                    <input id="email" class="form-control" readonly value="<?php echo $user['ngo_email']; ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="Url"> Website Url</label>
                                    <input type="Url" id="Url" class="form-control" readonly value="<?php echo $user['url']; ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="text">Description</label>
                                    <textarea rows="4" cols="50" id="description" class="form-control mb-1" style="resize:none" readonly>
                                    <?php echo $user['ngo_desc']; ?>
                                </textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } ?>
    <br /><br />
    <div id="Foot"></div>
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    $(function() {
        $("#Head").load("Header.php");
        $("#Foot").load("Footer.php");
    });
    AOS.init({
        duration: 950
    });
</script>

</html>