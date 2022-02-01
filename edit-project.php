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
        <div class="header">New Project</div>
        <hr>
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <form action="api/api_updateProject.php" method="post" enctype="multipart/form-data">
                        <div class="center">
                            <h5>Project Details</h5>
                        </div>
                        <div class="input-field">
                            <input type="text" name="prj_name_disable" placeholder="Project Name" class="validate">
                            <input type="hidden" name="prj_name">
                        </div>
                        <div class="input-field">
                            <input type="text" name="prj_date" placeholder="Date" class="datepicker">
                        </div>
                        <div class="input-field">
                            <input type="text" name="place" placeholder="Project Location" class="validate">
                        </div>
                        <div class="input-field">
                            <input type="text" name="short_desc" placeholder="Short Description (Approx 90 words)"
                                class="validate" id="short-desc">
                        </div>
                        <div class="input-field">
                            <input type="text" name="long_desc" placeholder="Long Description" class="validate"
                                id="long-desc">
                        </div>

                        ADD Images: Please select image as size 570*350
                        <div class="input-field">
                            <input type="file" name="files[]" multiple accept=".png,.jpg,.jpeg,.gif">
                        </div>
                        <br>
                        <input type="hidden" name="prj-type" id="pt">
                        <div class="input-field center">
                            <input type="submit" name="submit" value="UPLOAD" class="btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </main>

    <?php include './includes/scripts.php'; ?>
    <script>
    var urlParams = new URLSearchParams(window.location.search);
    var project = urlParams.get('project')

    doAjax('api/api_project.php', 'GET', {
            project: project
        })
        .then(response => {
            var project = JSON.parse(response).data[0];
            // console.log(project);
            $("input[name='prj_name']").val(project.name);
            $("input[name='prj_name_disable']").val(project.name);
            $("input[name='prj_name_disable']").prop('disabled', true);
            $("input[name='prj_date']").val(project.date);
            $("input[name='place']").val(project.location);
            $("input[name='short_desc']").val(project.description);
            $("input[name='long_desc']").val(project.details);

            var projectType = document.getElementById('pt');
            projectType.value = project.type;
        })

    })

    auth.onAuthStateChanged(user => {
                if (user) {} else {
                    window.location = "login.php"
                }
    </script>
    </script>
</body>

</html>