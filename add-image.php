<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/head.php'; ?>
    <style>
    form {
        margin: 1rem 5rem;
    }

    #short-desc {
        height: 8rem;
    }

    #long-desc {
        height: 12rem;
    }

    @media only screen and (max-width: 768px) {
        form {
            margin: 1rem 0;
        }
    }
    </style>
</head>

<body>

    <?php include './includes/nav.php'; ?>

    <main>
        <div class="header">Add Images</div>
        <hr>
        <div class="container">
            <div class="card">
                <div class="card-content">

                    <form action="api/api_addImage.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select id="project-type" name="project-type" class="browser-default"
                                    onchange="populate('project-type', 'project')">
                                    <option value="" disabled selected>Choose Project Type</option>
                                    <option value="Paridhan">Paridhan</option>
                                    <option value="Shikshan">Shikshan</option>
                                    <option value="Event">Events</option>
                                    <option value="Relief">Relief</option>
                                </select>
                                <!-- <label>Select Project Category</label> -->
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="project" name="project" class="browser-default">
                                    <option value="" disabled selected>Choose Project</option>
                                </select>
                                <!-- <label>Select Project Category</label> -->
                            </div>
                            <div class="input-field col s12">
                                ADD Images: Please select image as size 570*350 <br>

                                <input type="file" name="files[]" multiple accept=".png,.jpg,.jpeg,.gif"> <br>
                            </div>
                        </div>

                        <div class="center">
                            <input type="submit" name="submit" value="Add Images" class="btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </main>

    <?php include './includes/scripts.php'; ?>
    <script>
    var projects = [];
    doAjax('api/api_projects.php', 'GET', {
            project: ''
        })
        .then(response => {
            projects = JSON.parse(response).data;
        })

    const populate = (projectType, projectOption) => {

        var projectType = document.getElementById(projectType);
        var projectOption = document.getElementById(projectOption);

        projectOption.innerHTML = "";

        var optionArr = [];

        projects.forEach(project => {
            if (project.type == projectType.value) {
                optionArr.push(project.name);
            }
        })

        optionArr.forEach(option => {
            var newOption = document.createElement('option');

            newOption.value = option;
            newOption.innerHTML = option;

            projectOption.options.add(newOption);
        })
    }

    auth.onAuthStateChanged(user => {
        if (user) {} else {
            window.location = "login.php"
        }
    })
    </script>
</body>

</html>