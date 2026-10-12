

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Subject Form</title>

    <!-- Bootstrap CSS -->
    <link
        href="../../assets/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <!-- Main Container -->
    <div
        class="container py-5"
        style="max-width: 700px;"
    >

        <!-- Subject Form Card -->
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <h2>Subject Form</h2>

                <form method="POST">

                    <!-- Subject Code -->
                    <div class="mb-3">
                        <label class="form-label">
                            Subject Code
                        </label>

                        <input class="form-control" name="subject_code">
                    </div>

                    <!-- Subject Name -->
                    <div class="mb-3">
                        <label class="form-label">
                            Subject Name
                        </label>

                        <input class="form-control" name="subject_name">
                    </div>

                    <!-- Units -->
                    <div class="mb-3">
                        <label class="form-label">
                            Units
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="units"
                        >
                    </div>

                    <!-- Form Actions -->
                    <button
                        type="submit"
                        name="submit"
                        class="btn btn-primary"
                    >
                        Save Subject
                    </button>

                    <a
                        href="subjects.html"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</body>

</html>