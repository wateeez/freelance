<?php
// Get statistics from database
$qry = $conn->query("SELECT COUNT(*) as count FROM `project`");
$projects = $qry->fetch_assoc()['count'];

$qry = $conn->query("SELECT COUNT(*) as count FROM `education`");
$education = $qry->fetch_assoc()['count'];

$qry = $conn->query("SELECT COUNT(*) as count FROM `work`");
$work = $qry->fetch_assoc()['count'];

$qry = $conn->query("SELECT COUNT(*) as count FROM `users`");
$users = $qry->fetch_assoc()['count'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Welcome to <?php echo $_settings->info('name') ?></h2>
            <p class="text-muted">Dashboard Overview - Manage your portfolio website from here</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <!-- Projects Card -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $projects ?></h3>
                    <p>Total Projects</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder"></i>
                </div>
                <a href="./index.php?page=project" class="small-box-footer">
                    Manage Projects <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Education Card -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $education ?></h3>
                    <p>Education Entries</p>
                </div>
                <div class="icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <a href="./index.php?page=education" class="small-box-footer">
                    Manage Education <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Work Experience Card -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo $work ?></h3>
                    <p>Work Experience</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <a href="./index.php?page=work" class="small-box-footer">
                    Manage Work <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo $users ?></h3>
                    <p>Total Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="./index.php?page=user" class="small-box-footer">
                    Manage Users <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="row">
        <!-- Recent Projects -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-folder mr-1"></i>
                        Recent Projects
                    </h3>
                    <div class="card-tools">
                        <a href="./index.php?page=project" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Client</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $recent_projects = $conn->query("SELECT * FROM `project` ORDER BY id DESC LIMIT 5");
                            if($recent_projects->num_rows > 0):
                                while($row = $recent_projects->fetch_assoc()):
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['client'] ?></td>
                            </tr>
                            <?php 
                                endwhile;
                            else:
                            ?>
                            <tr>
                                <td colspan="2" class="text-center text-muted">No projects yet</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Work Experience -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-briefcase mr-1"></i>
                        Recent Work Experience
                    </h3>
                    <div class="card-tools">
                        <a href="./index.php?page=work" class="btn btn-sm btn-warning">
                            <i class="fas fa-plus"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $recent_work = $conn->query("SELECT * FROM `work` ORDER BY id DESC LIMIT 5");
                            if($recent_work->num_rows > 0):
                                while($row = $recent_work->fetch_assoc()):
                            ?>
                            <tr>
                                <td><?php echo $row['company'] ?></td>
                                <td><?php echo $row['position'] ?></td>
                            </tr>
                            <?php 
                                endwhile;
                            else:
                            ?>
                            <tr>
                                <td colspan="2" class="text-center text-muted">No work experience yet</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Education Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-graduation-cap mr-1"></i>
                        Education History
                    </h3>
                    <div class="card-tools">
                        <a href="./index.php?page=education" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 30%">School</th>
                                <th style="width: 30%">Degree</th>
                                <th style="width: 20%">Date</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $education_list = $conn->query("SELECT * FROM `education` ORDER BY year DESC, id DESC");
                            if($education_list->num_rows > 0):
                                while($row = $education_list->fetch_assoc()):
                            ?>
                            <tr>
                                <td><?php echo $row['school'] ?></td>
                                <td><?php echo $row['degree'] ?></td>
                                <td><?php echo $row['month'] . ' ' . $row['year'] ?></td>
                                <td>
                                    <a href="./index.php?page=education" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                endwhile;
                            else:
                            ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">No education entries yet</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-link mr-1"></i>
                        Quick Links
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <a href="./index.php?page=system_info" class="btn btn-app bg-primary">
                                <i class="fas fa-cog"></i> System Settings
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="./index.php?page=contact" class="btn btn-app bg-info">
                                <i class="fas fa-phone"></i> Contact Info
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="./index.php?page=about" class="btn btn-app bg-success">
                                <i class="fas fa-info-circle"></i> About Me
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="../index.php" target="_blank" class="btn btn-app bg-secondary">
                                <i class="fas fa-eye"></i> View Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>